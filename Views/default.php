<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Public/style/tailwind.css">
    <link rel="stylesheet" href="Public/style/style.css">
    <script type="text/javascript" src="Public/script/myscript.js" defer></script>
    <script src="https://kit.fontawesome.com/a95f1c7873.js" crossorigin="anonymous"></script>
    <title>Todolist</title>
</head>
<body>
<!--header-->
<header>
    <nav class="bg-gray-100 border-b border-gray-400 shadow-lg w-full flex relative justify-between items-center mx-auto px-8 h-12">
        <!-- logo -->
        <div class="inline-flex">
            <a class="_o6689fn" href="/">
                <div class="hidden md:block">
                    <h1 class="text-2xl text-pink-200 font-bold italic font-semibold"><i class=" fas fa-book-open mr-3"><span
                                    class="tshadow-perso text-2xl">Todolist</span></i></h1>
                </div>
            </a>
        </div>
        <!-- login -->
        <div class="flex-initial">
            <div class="flex justify-end items-center relative">
                <div class="block">
                    <div class="inline relative">
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="/tdl/Main"
                               class="inline-flex items-center relative px-2 border rounded-full hover:shadow-lg">
                            <span class="pl-1">
                                <i class="fas text-red-400 fa-power-off"></i>
                            </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end login -->
    </nav>

</header>
<main id="main">
    <?= $content ?>
</main>
<footer id="footer"></footer>
</body>
</html>