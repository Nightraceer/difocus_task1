<!doctype html>
<?php
/**
 * @var $orders array
 * @var $prevPage int|boolean
 * @var $nextPage int|boolean
 */
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/static/style.css">
    <title>Test</title>
</head>
<body>
<div class="orders-page">
    <h1>
        Заказы
    </h1>
    <div class="orders" data-update="table">
        <table>
            <thead>
            <tr>
                <th>
                    id
                </th>
                <th>
                    Стоимость заказа, руб
                </th>
                <th>
                    Адрес получателя
                </th>
                <th>
                    ФИО получателя
                </th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($orders as $order) { ?>
                <tr>
                    <td>
                        <?php echo $order['order_id']; ?>
                    </td>
                    <td>
                        <?php echo $order['summ']; ?>
                    </td>
                    <td>
                        <?php echo $order['address']; ?>
                    </td>
                    <td>
                        <?php echo $order['fio']; ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="paginate" data-update="paginate">
        <?php if ($prevPage !== false) { ?>
            <div class="prev">
                <a data-paginate-link href="<?php echo "?page={$prevPage}"; ?>">Предыдущая страница</a>
            </div>
        <?php } ?>

        <?php if ($nextPage !== false) { ?>
            <div class="next">
                <a data-paginate-link href="<?php echo "?page={$nextPage}"; ?>">Следующая страница</a>
            </div>
        <?php } ?>
    </div>

    <script
            src="http://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="/static/app.js"></script>
</div>
</body>
</html>