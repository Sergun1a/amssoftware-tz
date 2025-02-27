<?php
require_once 'DataClass.php';

$data = new DataClass();

echo 'Список автомобилей, снятые с производства на сентябрь 2010 года. В формате Марка, Модель, Дата снятия с производства.';
?>
<pre>
    <?=json_encode($data->endSept2010(), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );?>
</pre>
<?php
echo 'Список автомобилей и работ, которые не сняты с производства на текущий момент, где стоимость выше 1000 рублей. В формате Марка, Модель, Наименование работ, Стоимость работ.';
?>
<pre>
    <?=json_encode($data->stillProcessedNWork1000(), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );?>
</pre>

