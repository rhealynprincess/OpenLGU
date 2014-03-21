<?
class LogBehavior extends CActiveRecordBehavior
{
    private $_oldattributes = array();
 
    public function afterSave($event)
    {
        if (!$this->Owner->isNewRecord) {
 
            // new attributes
            $newattributes = $this->Owner->getAttributes();
            $oldattributes = $this->getOldAttributes();
 
            // compare old and new
            foreach ($newattributes as $name => $value) {
                if (!empty($oldattributes)) {
                    $old = $oldattributes[$name];
                } else {
                    $old = '';
                }
 
                if ($value != $old) {
                    //$changes = $name . ' ('.$old.') => ('.$value.'), ';
 
                    $log=new LogBehavior;
                    $log->description=  'User ' . Yii::app()->user->Name 
                                            . ' changed ' . $name . ' for ' 
                                            . get_class($this->Owner) 
                                            . '[' . $this->Owner->getPrimaryKey() .'].';
                    $log->action=       'CHANGE';
                    $log->model=        get_class($this->Owner);
                    $log->model_id=      $this->Owner->getPrimaryKey();
                    $log->field=        $name;
                    $log->create_date= new CDbExpression('NOW()');
                    $log->user_id=       Yii::app()->user->id;
                    $log->save();
                }
            }
        } else {
            $log=new LogBehavior;
            $log->description=  'User ' . Yii::app()->user->Name 
                                    . ' created ' . get_class($this->Owner) 
                                    . '[' . $this->Owner->getPrimaryKey() .'].';
            $log->action=       'CREATE';
            $log->model=        get_class($this->Owner);
            $log->model_id=      $this->Owner->getPrimaryKey();
            $log->field=        '';
            $log->create_date= new CDbExpression('NOW()');
            $log->user_id=       Yii::app()->user->id;
            $log->save();
        }
    }
 
    public function afterDelete($event)
    {
        $log=new LogBehavior;
        $log->description=  'User ' . Yii::app()->user->Name . ' deleted ' 
                                . get_class($this->Owner) 
                                . '[' . $this->Owner->getPrimaryKey() .'].';
        $log->action=       'DELETE';
        $log->model=        get_class($this->Owner);
        $log->model_id=      $this->Owner->getPrimaryKey();
        $log->field=        '';
        $log->create_date= new CDbExpression('NOW()');
        $log->user_id=       Yii::app()->user->id;
        $log->save();
    }
 
    public function afterFind($event)
    {
        // Save old values
        $this->setOldAttributes($this->Owner->getAttributes());
    }
 
    public function getOldAttributes()
    {
        return $this->_oldattributes;
    }
 
    public function setOldAttributes($value)
    {
        $this->_oldattributes=$value;
    }
}