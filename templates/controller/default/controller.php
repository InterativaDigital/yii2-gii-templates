<?php
/**
 * This is the template for generating a controller class file.
 */

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator common\templates\controller\Generator */

echo "<?php\n";
?>

namespace <?= $generator->getControllerNamespace() ?>;

use api\modules\v1\models\<?= Inflector::camelize($generator->controllerID) ?>;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;

/**
* <?= str_replace('Controller', ' Controller', StringHelper::basename($generator->controllerClass)) ?> API
*/
class <?= StringHelper::basename($generator->controllerClass) ?> extends <?= '\\' . trim($generator->baseClass, '\\') . "\n" ?>
{
public $modelClass = 'api\modules\v1\models\<?= Inflector::camelize($generator->controllerID) ?>';
public $createScenario = 'create';
public $updateScenario = 'update';

/**
* @inheritdoc
*/
public function behaviors()
{
$behaviors = parent::behaviors();

// Adding Http Bearer Authentication
$behaviors['authenticator'] = [
'class' => HttpBearerAuth::className(),
'except' => ['options']
];

return $behaviors;
}

public function actions()
{
$actions = parent::actions();

$actions['index']['prepareDataProvider'] = function () {
return new ActiveDataProvider([
'query' => <?= Inflector::camelize($generator->controllerID) ?>::find(),
'pagination' => [
'pageSizeLimit' => [0, 50],
],
]);
};

return $actions;
}
}
