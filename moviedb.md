#数据库名 movieDB

##1.	users（用户表）
		id 		  	       
		uid       (会员信息id)
		password  (密码)
		phone     (手机号)
		addtime   (注册时间)
		logintime （登录时间）
		loginip		(登录者ip)

##2.	users_detail (用户详情表)
		id        (会员信息id)
		nickname  (用户名)
		sex       (性别)
		address   (地址)
		status    (状态)
		email     (邮箱)
		firsttime (首次登录时间)
		lasttime  (最后一次登录时间)  

##3.	admin(后台管理员)
		id,
		账号(account),
		密码(pass),
		真实姓名(name),
		角色(role),
		状态(status),
		添加时间(addtime)

			
##4.	
			
##8.	 商家详情表（shop_detail）
		ID号，
		帐号(name),
		密码(password),
		商家名称（shopname），
		手机(phone),
		法人代表（Legal），
		身份证号(id_card)，
		城市（city）,		
    	县，区（county）
		区域，(region)
		地址（address），
		营业执照（licence），
		状态（status）（是否通过审核），
		注册时间（addtime）

	
##10.    商家表(rel_shop)
		ID号，sid(商家详情id),hid(影厅id),影片(fid),    
##11.	  影片信息(film):
        id号,名称(title),图片(picname),类型fid,首映时间(firsttime),时长(duration),
        导演(director),主演(actor),地区(region),简介(introduction),语言版本(language)
        评分(score),状态(status,[1.未上映2.上映3.下架])，
		
##12.    影厅表(hall)
		ID号,title(名称),number(座位数),layout(座位布局),

##13.    放映信息(projection)
		ID号,fid(影片信息id),放映厅(hid)，放映时间(datetime),价格(price),座位信息(seatinfo)
		   
##14.    订单关联表（rel_orders）
		id，uid（用户id）,pid(放映信息id)，商家id（sid）,订单详情id(oid),

##15.	  订单详情(orders)
		id,订单总金额(totalprice)，座位信息(seat),放映时间(playtime)
        ,下单时间(addtime),支付状态(ispay).
    





    