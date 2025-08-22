<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Заполнение заявления';
?>

<div class="container-fluid py-4">
    <div class="row">
        <!-- Левая часть: инструкция -->
        <!-- Левая часть: инструкция -->
        <div class="col-md-6 mb-4">
            <h2 class="text-primary mb-3">Инструкция по заполнению</h2>
            <p class="mb-2">1. Укажите ваши <strong>Фамилию, Имя и Отчество</strong> полностью.</p>
            <p class="mb-2">2. В разделе <strong>Адрес</strong> укажите место постоянной прописки.</p>
            <p class="mb-2">3. Выберите <strong>тип поступления</strong> и <strong>образовательную программу</strong> из выпадающих списков.</p>
            <p class="mb-2">4. Определите <strong>язык обучения</strong>, отметив соответствующий вариант.</p>
            <p class="mb-2">5. Нажмите кнопку <strong>«Сохранить и сформировать PDF»</strong>, чтобы завершить процесс заполнения.</p>

            <h4 class="text-success mt-4">Что будет дальше?</h4>
            <p class="mb-2">После нажатия на кнопку вы будете перенаправлены на страницу <strong>предпросмотра документа</strong>.</p>
            <p class="mb-2">На странице предпросмотра появится кнопка <strong>«Подписать через ЭЦП»</strong>.</p>
            <p class="mb-2">При нажатии на эту кнопку автоматически откроется <strong>NCALayer</strong>, где вам будет предложено выбрать ваш сертификат ЭЦП.</p>
            <p class="mb-2">После подтверждения документ будет <strong>подписан через ЭЦП</strong> и отправлен в систему.</p>

            <p class="text-muted mt-3">Все поля формы обязательны для заполнения.</p>
        </div>


        <!-- Правая часть: форма -->
        <div class="col-md-6">

                <?php $form = ActiveForm::begin(['options' => ['class' => 'row g-3']]); ?>

                <!-- Личные данные -->
                <div class="has-danger col-md-4">
                    <?= $form->field($model, 'surname')->textInput(['maxlength' => true, 'placeholder' => 'Фамилия', 'class' => 'form-control'])->label(false) ?>
                    <div class="invalid-feedback">Sorry, that username's taken. Try another?</div>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'Имя', 'class' => 'form-control'])->label(false) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true, 'placeholder' => 'Отчество', 'class' => 'form-control'])->label(false) ?>
                </div>

                <!-- Адрес -->
                <div class="col-12">
                    <?= $form->field($model, 'address')->textarea(['rows' => 2, 'placeholder' => 'Адрес прописки', 'class' => 'form-control'])->label(false) ?>
                </div>

                <!-- Тип поступления -->
            <div class="col-md-6">
                <?= $form->field($model, 'education_type')->dropDownList([
                    'обладателя государственного образовательного гранта' => 'Гос. образовательный грант',
                    'обладателя государственного образовательного гранта по сокращённым образовательным программам' => 'Гос. грант (сокращённые программы)',
                    'обладателя гранта местного исполнительного органа' => 'Грант местного органа',
                    'на платной основе по конкурсу сертификатов, выданных по результатам ЕНТ' => 'Платно по ЕНТ',
                    'на платной основе по сокращённым образовательным программам' => 'Платно (сокращённые программы)',
                    'грант «Казахстан Халкына»' => 'Грант «Казахстан Халкына»',
                    'образовательный грант для молодёжи из густонаселённых и западных регионов' => 'Грант для отдалённых регионов',
                ], [
                    'prompt' => 'Тип поступления',
                    'class' => 'form-select shadow-sm'
                ])->label(false) ?>
            </div>

            <!-- Программа -->
            <div class="col-md-6">
                <?= $form->field($model, 'edu_program')->dropDownList([
                    '6В02101 — Дизайн (доучивание)' => '6В02101 — Дизайн (доучивание)',
                    '6В04107 — Экономика промышленности' => '6В04107 — Экономика промышленности',
                    '6В11302 — Логистика (Транспорт)' => '6В11302 — Логистика (Транспорт)',
                ], [
                    'prompt' => 'Образовательная программа',
                    'class' => 'form-select shadow-sm'
                ])->label(false) ?>
            </div>


            <!-- Язык обучения -->
                <div class="col-12 text-center">
                    <div class="w-100 justify-content-center" role="group">
                        <?php
                        echo $form->field($model, 'edu_language')->radioList([
                            'Казахский' => 'Казахский',
                            'Русский' => 'Русский',
                            'Английский' => 'Английский',
                        ], [
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $id = 'btnradio' . $index;
                                $checkedAttr = $checked ? 'checked' : '';
                                return <<<HTML
<input type="radio" class="btn-check" name="{$name}" id="{$id}" value="{$value}" autocomplete="off" {$checkedAttr}>
<label class="btn btn-outline-primary mx-2 px-3 py-2 shadow-sm" for="{$id}">{$label}</label>
HTML;
                            },
                            'class' => 'd-inline-block',
                            'style' => 'margin: 0 auto;',
                        ])->label(false);
                        ?>
                </div>

                <!-- Скрытая дата -->
                <?= $form->field($model, 'date_filled')->hiddenInput(['value' => time()])->label(false) ?>

                <!-- Кнопка -->
                <div class="col-12 mt-3 pt-3">
                    <?= Html::submitButton('Сохранить', [
                        'class' => 'btn btn-success w-100 py-2 shadow-sm',
                        'style' => 'border-radius: 30px; font-size: 1.1rem;'
                    ]) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
