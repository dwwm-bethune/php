<?php
    require 'config/helpers.php';

    // Les avis
    $reviews = [
        ['name' => 'Fiorella Mota', 'review' => 'Très bon restaurant', 'note' => 5, 'created_at' => '2022-02-09 11:43:12'],
        ['name' => 'Marina Mota', 'review' => 'Super restaurant', 'note' => 4, 'created_at' => '2022-02-04 08:12:45'],
        ['name' => 'Matthieu Mota', 'review' => 'Mauvais restaurant', 'note' => 2, 'created_at' => '2022-02-06 18:23:54'],
    ];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ch'ti Restaurant</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="font-['Nunito']">
    <div class="max-w-7xl px-3 mx-auto">
        <h1 class="text-5xl my-12">Ch'ti Restaurant</h1>

        <div class="border border-gray-300 rounded-md">
            <div class="border-b border-gray-300 bg-gray-100 px-3 py-2 rounded-t-md">Notre moyenne</div>
            <div class="px-3 py-6">
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-1/3 text-center">
                        <h1 class="text-yellow-500 mt-4 mb-8 text-4xl">
                            <?= round(reviews_avg($reviews), 1); ?> / 5
                        </h1>
                        <div class="mb-3">
                            <?php for ($i = 0; $i < 5; $i++) { ?>
                            <i class="fas fa-star mr-1 <?= ($i < ceil(reviews_avg($reviews))) ? 'text-yellow-500' : ''; ?>"></i>
                            <?php } ?>
                        </div>
                        <h3><?= count($reviews); ?> avis</h3>
                    </div>
                    <div class="w-full lg:w-1/3">
                        <?php for ($i = 5; $i > 0; $i--) { ?>
                        <div class="flex items-center justify-center">
                            <div>
                                <?= $i; ?> <i class="fas fa-star text-yellow-500"></i>
                            </div>
                            <div class="w-2/3 px-6">
                                <div class="h-4 bg-gray-200 rounded overflow-hidden">
                                    <div class="h-4 bg-yellow-500" style="width: <?= reviews_percentage_note($reviews, $i); ?>%"></div>
                                </div>
                            </div>
                            <div>(<?= reviews_count_note($reviews, $i); ?>)</div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="w-full lg:w-1/3 text-center">
                        <h3 class="mt-4 mb-3 text-3xl">Laissez votre avis</h3>
                        <button type="button" class="bg-blue-500 py-2 px-3 rounded-md text-white hover:bg-blue-600 duration-500">Noter</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="border border-gray-300 rounded-md mt-12">
            <div class="border-b border-gray-300 bg-gray-100 px-3 py-2 rounded-t-md">Publier un avis</div>
            <div class="px-3 py-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 lg:flex">
                        <label for="name" class="block lg:w-1/3 lg:text-right py-2 pr-6">Nom</label>
                        <div class="lg:w-1/2">
                            <input type="text" class="w-full border-gray-300 rounded-lg" name="name" id="name" placeholder="Votre nom" value="">
                        </div>
                    </div>

                    <div class="mb-3 lg:flex">
                        <label for="review" class="block lg:w-1/3 lg:text-right py-2 pr-6">Commentaire</label>
                        <div class="lg:w-1/2">
                            <textarea class="w-full border-gray-300 rounded-lg" name="review" id="review" placeholder="Votre commentaire"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 lg:flex items-center">
                        <label for="note" class="block lg:w-1/3 lg:text-right py-2 pr-6">Note</label>
                        <div class="lg:w-1/2 flex">
                            <div class="mr-4 flex items-center">
                                <input class="border-gray-300 mr-2" type="radio" name="note" id="note-1" value="1">
                                <label for="note-1">1</label>
                            </div>
                            <div class="mr-4 flex items-center">
                                <input class="border-gray-300 mr-2" type="radio" name="note" id="note-2" value="2">
                                <label for="note-2">2</label>
                            </div>
                            <div class="mr-4 flex items-center">
                                <input class="border-gray-300 mr-2" type="radio" name="note" id="note-3" value="3">
                                <label for="note-3">3</label>
                            </div>
                            <div class="mr-4 flex items-center">
                                <input class="border-gray-300 mr-2" type="radio" name="note" id="note-4" value="4">
                                <label for="note-4">4</label>
                            </div>
                            <div class="mr-4 flex items-center">
                                <input class="border-gray-300 mr-2" type="radio" name="note" id="note-5" value="5">
                                <label for="note-5">5</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 lg:flex">
                        <label for="meal" class="block lg:w-1/3 lg:text-right py-2 pr-6">Repas</label>
                        <div class="lg:w-1/2">
                            <input type="file" class="border border-gray-300 w-full rounded-lg file:border-0 file:bg-gray-100 file:px-3 file:py-2 file:mr-3 file:hover:bg-gray-200 file:duration-500 file:cursor-pointer cursor-pointer" name="meal" id="meal" placeholder="Votre repas">
                        </div>
                    </div>

                    <div class="mb-3 flex">
                        <div class="lg:w-1/3">&nbsp;</div>
                        <div class="lg:w-1/2">
                            <button class="bg-blue-500 py-2 px-3 rounded-md text-white hover:bg-blue-600 duration-500">Noter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="py-12">
            <?php foreach ($reviews as $review) { ?>
            <div class="lg:flex mb-12">
                <div class="w-full lg:w-1/12">
                    <div class="w-20 h-20 rounded-full bg-yellow-500 text-white text-3xl mx-auto mb-8">
                        <h3 class="text-center leading-[5rem]"><?= $review['name'][0]; ?></h3>
                    </div>
                </div>
                <div class="w-full lg:w-11/12">
                    <div class="border border-gray-300 rounded-md">
                        <div class="border-b border-gray-300 bg-gray-100 px-3 py-2 rounded-t-md"><?= $review['name']; ?></div>
                        <div class="px-3 py-6">
                            <div class="flex justify-between">
                                <div>
                                    <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <i class="fas fa-star mr-1 <?= ($i < $review['note']) ? 'text-yellow-500' : ''; ?>"></i>
                                    <?php } ?>
                                    <p><?= $review['review']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-gray-300 bg-gray-100 px-3 py-2 rounded-b-md text-right"><?= format_date($review['created_at']); ?></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
