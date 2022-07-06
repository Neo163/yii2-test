<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="/" class="btn btn-primary search-btn" style="float:right;">恢复</a>
      <div class="btn btn-primary search-btn" style="float:right; margin-right: 10px;" onclick="exportCsv()">导出CSV</div>
    </div>
  </div>
</div>

<?php
$data = [
    'id' => 'myUserGridView',
    'dataProvider' => $provider,
    'filterModel' => $model,
    'columns' => [
        //Check box column
        ['class' => 'yii\grid\CheckboxColumn'],
        //Display serial number column
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label' => 'ID',
            'filter' => [
                '<' => '<10',
                '<=' => '<=10',
                '>' => '>10',
                '>=' => '>=10',
            ], // 选项
            'attribute' => 'id', // 字段
            'format' => 'raw', // 格式
            'headerOptions' => [ // 样式
                'style' => 'width:120px;',
            ],
        ],
        [
            'label' => 'Name',
            'attribute' => 'name',
            'format' => 'raw',
        ],
        [
            'label' => 'Code',
            'attribute' => 'code',
            'format' => 'raw',
        ],
        [
            'label' => 'Status',
            'filter' => ['ok' => 'OK ', 'hold' => 'Hold'], // 选项
            'attribute' => 't_status',
            'format' => 'raw',
            'value' => function ($data) {
                return ($data->t_status == 'ok') ? 'OK ' : 'Hold';
            },
        ],
    ],
];
echo GridView::widget($data);?>

<center class="select-text">
  All 50 conversation on this page have been selected.
  <span class="select-brn" onclick="selectAll()">
    Selent all conversations that match this search
  </span>
</center>

<center class="clear-text">
  All conversations in this search have been selected.
  <span class="select-brn" onclick="clearAll()">
    Clear selection
  </span>
</center>

<script src="/js/jquery-3.6.0.min.js"></script>
<script>
$(".clear-text, .select-on-check-all").hide();

function exportCsv()
{
    var keys = $("#myUserGridView").yiiGridView('getSelectedRows');

    if(keys.length == 0){
        alert('没有选中导出的数据');
    } else {
        const url = 'http://n.yii2.com/?r=supplier/export&ids='+keys;
        window.open(url, '_blank');
    }
}

function selectAll()
{
  $('.select-on-check-all').trigger("click");
  $(".select-text").hide();
  $(".clear-text").show();
}
function clearAll()
{
  $('.select-on-check-all').trigger("click");
  $(".select-text").show();
  $(".clear-text").hide();
}

$('input').click(function()
{
  $(".select-text").show();
  $(".clear-text").hide();

});
</script>

<style>
.select-brn {
    color: blue;
    cursor: pointer;
    font-weight: bold;
}
</style>