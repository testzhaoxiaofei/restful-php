<?php

/**
 * model
 * @author auto create
 */
class Model
{
	
	/** 
	 * 失效时间
	 **/
	public $expire_date;
	
	/** 
	 * 总流量(KB)
	 **/
	public $flow_resource;
	
	/** 
	 * 资源名称
	 **/
	public $res_name;
	
	/** 
	 * 流量类型(例如上网流量、测试流量)
	 **/
	public $resource_type;
	
	/** 
	 * 剩余流量(KB)
	 **/
	public $rest_of_flow;
	
	/** 
	 * 生效时间
	 **/
	public $valid_date;	
}
?>