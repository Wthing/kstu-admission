<?php
use yii\helpers\Html;

/** @var \app\models\Form $model */

$this->title = 'Успешная подпись документа';
?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card text-white bg-success mb-3" style="max-width: 30rem;">
        <div class="card-header">Документ подписан</div>
        <div class="card-body">
            <h4 class="card-title">Успешно!</h4>
            <p class="card-text">
                Ваш документ был подписан электронной цифровой подписью и сохранён в системе.
            </p>

            <ul class="list-unstyled">
                <li><strong>ФИО:</strong> <?= Html::encode("{$model->surname} {$model->first_name} {$model->patronymic}") ?></li>
                <li><strong>Программа:</strong> <?= Html::encode($model->edu_program) ?></li>
                <li><strong>Язык обучения:</strong> <?= Html::encode($model->edu_language) ?></li>
                <li><strong>Дата подачи:</strong> <?= date('d.m.Y H:i', $model->date_filled) ?></li>
            </ul>

            <a href="<?= Yii::$app->homeUrl ?>" class="btn btn-light mt-3">
                Вернуться на главную
            </a>
        </div>
    </div>
</div>
