<?php
use app\services\GeneratePdfService;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$config = [
    'id' => 'test-app',
    'basePath' => __DIR__,
    'vendorPath' => __DIR__ . '/vendor',
    'aliases' => [
        '@webroot' => __DIR__ . '/web',
        '@runtime' => __DIR__ . '/runtime'
    ],
];

new yii\console\Application($config);

require __DIR__ . '/services/GeneratePdfService.php';

$pdfPath = Yii::getAlias('@runtime') . '/test/test.pdf';

$signer = new GeneratePdfService();
$result = $signer->signDoc($pdfPath);

if ($result && filesize($pdfPath) > 0) {
    echo "✅ Подпись выполнена\n";
} else {
    echo "❌ Ошибка при подписании\n";
}
