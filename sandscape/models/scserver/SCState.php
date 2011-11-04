<?php

/**
 * Class: SCState
 *
 * @author serra
 */
class SCState {

   private $id;
   private $name;
   private $image;

   public function __construct($name, $image) {
      $this->id = uniqid('sc');
      $this->name = $name;
      $this->image = $image;
   }

   public function getId() {
      return $this->id;
   }

   public function getName() {
      return $this->name;
   }

   public function getImage() {
      return $this->image;
   }
   
   public function getInfo()
   {
      return (object) array(
          'id' => $this->id,
          'name' => $this->name
      );
   }

   public function getJSONData() {
      return (object) array(
                  'id' => $this->id,
                  'src' => $this->image,
      );
   }

}

?>