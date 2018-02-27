<?php

namespace jakharbek\posts\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use jakharbek\posts\models\Posts;
use yii\helpers\ArrayHelper;

/**
 * PostsSearch represents the model behind the search form of `jakharbek\posts\models\Posts`.
 */
class PostsSearch extends Posts
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'sort', 'status', 'lang', 'user_id'], 'integer'],
            [['title', 'subtitle', 'description', 'content', 'slug', 'date_update', 'date_create', 'date_publish', 'lang_hash'], 'safe'],
        ];
    }
    public function init()
    {
        parent::init();
        $this->setScenario(self::SCENARIO_SEARCH);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return ArrayHelper::merge(Model::scenarios(),[
            self::SCENARIO_SEARCH => ['post_id', 'sort', 'status', 'lang', 'user_id','title', 'subtitle', 'description', 'content', 'slug', 'date_update', 'date_create', 'date_publish', 'lang_hash'],
            ]);
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = Posts::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $this->load($params);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'post_id' => $this->post_id,
            'sort' => $this->sort,
            'status' => $this->status,
            'lang' => $this->lang,
            'user_id' => $this->user_id,
        ]);
        if(strlen($this->date_create) > 0):
            $date_create = explode(' - ',$this->date_create);
            $date_create_start = strtotime($date_create[0]);
            $date_create_end = strtotime($date_create[1]);
            $query->andFilterWhere(['between', 'date_create', $date_create_start, $date_create_end ]);
        endif;

        if(strlen($this->date_update) > 0):
            $date_update = explode(' - ',$this->date_update);
            $date_update_start = strtotime($date_update[0]);
            $date_update_end = strtotime($date_update[1]);
            $query->andFilterWhere(['between', 'date_create', $date_update_start, $date_update_end ]);
        endif;

        if(strlen($this->date_publish) > 0):
            $date_publish = explode(' - ',$this->date_publish);
            $date_publish_start = strtotime($date_publish[0]);
            $date_publish_end = strtotime($date_publish[1]);
            $query->andFilterWhere(['between', 'date_create', $date_publish_start, $date_publish_end ]);
        endif;

        $query->andFilterWhere(['ilike', 'title', $this->title])
            ->andFilterWhere(['ilike', 'subtitle', $this->subtitle])
            ->andFilterWhere(['ilike', 'description', $this->description])
            ->andFilterWhere(['ilike', 'content', $this->content])
            ->andFilterWhere(['ilike', 'slug', $this->slug])
            ->andFilterWhere(['ilike', 'lang_hash', $this->lang_hash]);

        return $dataProvider;
    }
}
