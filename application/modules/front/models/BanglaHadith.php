<?php

namespace app\modules\front\models;

use app\modules\front\models\Hadith;

/**
 * This is the model class for table "BanglaHadithTable".
 *
 * The followings are the available columns in table 'BanglaHadithTable':
 * @property string $collection
 * @property integer $volumeNumber
 * @property integer $bookNumber
 * @property string $bookName
 * @property integer $babNumber
 * @property string $babName
 * @property integer $hadithNumber
 * @property string $hadithText
 * @property string $bookID
 * @property string $grade
 * @property string $comments
 * @property integer $ourHadithNumber
 */
class BanglaHadith extends Hadith
{

    public function process_text() {
        $processed_text = trim($this->hadithText);
        $processed_sanad = trim($this->hadithSanad);
        $processed_text .= "</b>";

        $processed_text = str_replace("+", " ", $processed_text);
        $processed_sanad = str_replace("+", " ", $processed_sanad);

		if (strcmp($this->collection, "bukhari")) { $processed_text = preg_replace("/\n+/", "<br>\n", $processed_text); }

        $this->hadithText = $processed_text;
        $this->hadithSanad = $processed_sanad;
    }

    public static function tableName()
    {
        return '{{BanglaHadithTable}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'banglaURN' => 'English Urn',
            'collection' => 'Collection',
            'volumeNumber' => 'Volume Number',
            'bookNumber' => 'Book Number',
            'bookName' => 'Book Name',
            'babNumber' => 'Bab Number',
            'babName' => 'Bab Name',
            'hadithNumber' => 'Hadith Number',
            'hadithText' => 'Hadith Text',
            'bookID' => 'Book',
            'grade' => 'Grade',
            'comments' => 'Comments',
            'ourHadithNumber' => 'Our Hadith Number',
            'matchingArabicURN' => 'Matching Arabic Urn',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('banglaURN',$this->banglaURN);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}
