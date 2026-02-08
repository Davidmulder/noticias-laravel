<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = storage_path('app\feed\tecnologia.xml'); // noticia pega na internet local

        if (!file_exists($path)) {
            $this->command?->warn("Arquivo não encontrado: {$path}");
            return;
        }

        libxml_use_internal_errors(true);

        $xml = simplexml_load_file($path, 'SimpleXMLElement', LIBXML_NOCDATA);
        if (!$xml) {
            $this->command?->warn("Falha ao ler XML. Verifique se o arquivo é um RSS/XML válido.");
            return;
        }

        // RSS geralmente vem em $xml->channel->item
        $items = $xml->channel->item ?? [];
        $count = 0;

        foreach ($items as $item) {
            if ($count >= 10) break;

            $title = trim((string) ($item->title ?? ''));
            $url   = trim((string) ($item->link ?? ''));

            if ($title === '' || $url === '') {
                continue;
            }

            // limpamos e geramos resumo
            $descriptionRaw = (string) ($item->description ?? '');
            $descriptionTxt = trim(strip_tags($descriptionRaw));

            // tenta pegar imagem
            $image = null;

            if (isset($item->enclosure) && isset($item->enclosure['url'])) {
                $image = (string) $item->enclosure['url'];
            } else {

                $namespaces = $item->getNameSpaces(true);
                if (isset($namespaces['media'])) {
                    $media = $item->children($namespaces['media']);
                    if (isset($media->content) && isset($media->content->attributes()->url)) {
                        $image = (string) $media->content->attributes()->url;
                    }
                }
            }

            
            $texto = $descriptionTxt;

            $resumo = Str::limit($descriptionTxt, 160, '...');


            $publicar = true;

            // cria/atualiza evitando duplicar pela url
            News::updateOrCreate(
                ['url' => $url],
                [
                    'title'    => $title,
                    'resumo'   => $resumo ?: null,
                    'texto'    => $texto ?: null,
                    'image'    => $image,
                    'publicar' => $publicar,
                ]
            );

            $count++;
        }

        $this->command?->info("Seeder finalizado: {$count} notícias inseridas/atualizadas.");
    }
}
