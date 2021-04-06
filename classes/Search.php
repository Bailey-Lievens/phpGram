<?php
    class Search {
        private $isTag;
        private $input;

        public function setInput($input){
            $this->input = $input;
            $this->isTag = $isTag;
        }

        public function getInput(){
            return $this->input;
        }

        public function setIsTag($isTag){
            $this->isTag = $isTag;
        }

        public function getIsTag(){
            return $this->isTag;
        }
    }
?>