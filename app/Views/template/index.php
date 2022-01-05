<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- My CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <title><?= $title; ?></title>
</head>

<body>

    <div class="container vh-100 bg-info pt-3">
        <div class="row">
            <div class="col">
                <?= $this->renderSection('page-content') ?>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap Bundle -->
    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>