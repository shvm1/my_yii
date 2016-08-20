+prv_diet
+    id
    title
    kal
    status_del
    
    
+prv_dietday
+    id
    diet_id -> prv_diet
    num
    status_del
    
+prv_kit
    id
    title
    status_del
    
+prv_meal
    id
    title
    status_del
    
+prv_kit_meal
    kit_id -> prv_kit
    meal_id -> prv_meal
    
+prv_diet_price
    diet_id -> prv_diet
    kit_id -> prv_kit
    price
    
+prv_unit
    id
    title
    status_del
    
+prv_dietday_meal_dish    
    id
    dietday_id -> prv_dietday
    meal_id -> prv_meal
    dish_id -> prv_dish
    value

+prv_paymethod
    id
    title
    
+prv_paystatus
    id
    title
    
+prv_service
    id
    title
    price
    status_del
    
+prv_shipment
    id
    title
    price
    status_del
    
+prv_vitamin
    id
    title
    unit_id -> prv_unit
    status_del
    
+prv_dish
+    id
    kal
    protein
    fat
    carbohydrate
    title
    url
    image
    weight
    description
    price
    status_del
    
+prv_order
    id
    user_id
    diet_id
    kit_id
    shipment_id
    address_id
    discount
    phone
    email
    deliverytime_id
    comment
    count_person
    paymethod_id
    pay
    status_pay
    status_del
    
+prv_orderday
    id
    user_id
    order_id
    diet_id
    kit_id
    price
    shipment_id
    deliverytime_id
    adres_id
    num
    dateday
    status_del
    
+prv_orderday_service
    id
    orderday_id
    service_id
    
+prv_deliverytime
    id
    title
    color
    sort
    status_del
    
+prv_orderday_meal_dish
    id
    orderday_id
    meal_id
    dish_id
    value
    
+prv_address
    id
    user_id
    address
    status_del
    
+prv_user
    id
    login
    pass
    name
    hash
    phone
    email
    usergroup_id
    status_del

+prv_usergroup
    id
    title
    
+prv_user_right
    user_id
    usergroup_id
    right_id

+prv_right
    id
    title
    
+prv_dish_vitamin
    id
    dish_id
    vitamin_id
    value
    
    