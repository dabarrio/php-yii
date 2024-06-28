<?php

namespace app\controllers\api;

use app\models\ProductsModel;
use Exception;
// use Exception;
use Yii;
use yii\rest\Controller;
use yii\web\Request;
use yii\web\Response;

// use yii\rest\ActiveController;

class ProductController extends Controller
{
    // public $modelClass = 'app\models\ProductsModel';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => \yii\filters\ContentNegotiator::class,
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        return $behaviors;
    }

    public function actionIndex()
    {
        return ProductsModel::find()->all();
    }

    public function actionFindById(int $id)
    {
        try {
            $jwt = Yii::$app->request->headers->get('Authorization');

            if (!$jwt) throw new Exception('No autorizado', 401);

            $user = $jwt;

            $product = ProductsModel::findOne($id);

            if (!$product) return null;

            return $product;
        } catch (\Exception $e) {
            // 200 500 6900
            throw new Exception($e->getMessage(), 500);
        }
    }

    public function actionCreateProduct()
    {
        try {
            $body = Yii::$app->request->post();

            // name
            $name = isset($body['name']) ?
                $body['name'] :
                throw new \Error('Es obligatorio', 500);
            if (gettype($name) != 'string') throw new \Error('Tiene que ser un string', 500);

            // price
            $addTax = $body['price'] * 1.21;

            $newProduct = new ProductsModel();
            $newProduct->load(
                [
                    "name" => $name,
                    "price" => $addTax,
                    "description" => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit magni consequatur quae quidem inventore porro ipsum voluptas voluptate fugiat commodi, iusto totam. Similique ad, labore illum odit qui fugiat laborum?'
                ],
                ''
            );
            $newProduct->save();

            return $newProduct;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 402);
        }
    }
}
