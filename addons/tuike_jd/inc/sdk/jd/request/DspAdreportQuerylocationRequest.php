<?php
class DspAdreportQuerylocationRequest
{
	private $apiParas = array();
	
	public function getApiMethodName(){
	  return "jingdong.dsp.adreport.querylocation";
	}
	
	public function getApiParas(){
		return json_encode($this->apiParas);
	}
	
	public function check(){
		
	}
	
	public function putOtherTextParam($key, $value){
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
                                                        		                                    	                        	                   			private $platform;
    	                        
	public function setPlatform($platform){
		$this->platform = $platform;
         $this->apiParas["platform"] = $platform;
	}

	public function getPlatform(){
	  return $this->platform;
	}

                        	                   			private $startDay;
    	                        
	public function setStartDay($startDay){
		$this->startDay = $startDay;
         $this->apiParas["startDay"] = $startDay;
	}

	public function getStartDay(){
	  return $this->startDay;
	}

                        	                   			private $endDay;
    	                        
	public function setEndDay($endDay){
		$this->endDay = $endDay;
         $this->apiParas["endDay"] = $endDay;
	}

	public function getEndDay(){
	  return $this->endDay;
	}

                        	                   			private $OrderStatusCategory;
    	                        
	public function setOrderStatusCategory($OrderStatusCategory){
		$this->OrderStatusCategory = $OrderStatusCategory;
         $this->apiParas["OrderStatusCategory"] = $OrderStatusCategory;
	}

	public function getOrderStatusCategory(){
	  return $this->OrderStatusCategory;
	}

                        	                   			private $isTodayOr15Days;
    	                        
	public function setIsTodayOr15Days($isTodayOr15Days){
		$this->isTodayOr15Days = $isTodayOr15Days;
         $this->apiParas["isTodayOr15Days"] = $isTodayOr15Days;
	}

	public function getIsTodayOr15Days(){
	  return $this->isTodayOr15Days;
	}

                        	                   			private $isOrderOrClick;
    	                        
	public function setIsOrderOrClick($isOrderOrClick){
		$this->isOrderOrClick = $isOrderOrClick;
         $this->apiParas["isOrderOrClick"] = $isOrderOrClick;
	}

	public function getIsOrderOrClick(){
	  return $this->isOrderOrClick;
	}

                                                    	}





        
 

