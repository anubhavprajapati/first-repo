<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $product_handle
 * @property string $images
 * @property int $price
 * @property int $inventory
 * @property string $created_at
 * @property string $updated_at
 * @property int $status
 *
 * @property ProductVarient[] $productVarients
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id', 'price', 'inventory', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'product_handle', 'images'], 'string', 'max' => 255],
            [['product_handle'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'product_handle' => 'Product Handle',
            'images' => 'Images',
            'price' => 'Price',
            'inventory' => 'Inventory',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductVarients()
    {
        return $this->hasMany(ProductVarient::className(), ['product_id' => 'id']);
    }
}
