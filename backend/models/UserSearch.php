<?php

namespace app\models;

use common\models\Feedback;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class UserSearch extends Feedback
{
    public static function tableName()
    {
        return 'feedback';
    }
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['user_id','string'],
            ['name','string'],
            ['surname','string'],
            ['phone','string'],
            ['email','string'],
        ]);
    }
    public function search($params, $is_personal=false)
    {
        if($is_personal) {
            $query = static::find()->where(['user_id' => Yii::$app->user->identity->id]);
        }
        else{
            $query = static::find();
        }

        $this->load($params);

        $query->filterWhere(['user_id' => $this->user_id]);
        $query->andFilterWhere(['LIKE', 'name', $this->name]);
        $query->andFilterWhere(['LIKE', 'surname', $this->surname]);
        $query->andFilterWhere(['LIKE', 'phone', $this->phone]);
        $query->andFilterWhere(['LIKE', 'email', $this->email]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 60,
            ],
        ]);

        return $dataProvider;
    }
    public function getFilterList($dataProvider){
        $filters = array();
        foreach ($dataProvider->getModels() as $i=>$elems){
            foreach ($elems as $k=>&$elem){
                if($k=='id' || $k=='user_id' || $k=='text'){
                    continue;
                }
                $filters[$k][$i]=$elem;
            }
        }
        return $filters;
    }
}