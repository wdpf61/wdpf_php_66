class Cart {
  constructor(cartName) {
    this.cartName=cartName;   
  }

  // ==========Methods============

  getCart(){
    let cart= localStorage.getItem(this.cartName);
    cart=JSON.parse(cart);
    return cart;
   }//end getCart

  save(item){
    let cart= localStorage.getItem(this.cartName);

    if(cart!=null){
      if(!this.itemExists(item.item_id)){
        cart=JSON.parse(cart);
        cart.push(item);
        localStorage.setItem(this.cartName, JSON.stringify(cart));
      }else{
        this.QtyUp(item.item_id,item.qty);
      }

    }else{
      cart=[];
      cart.push(item);
      localStorage.setItem(this.cartName, JSON.stringify(cart));
    }
  }//end save


  QtyUp(id,qty){
    //console.log(id)
    let cart= localStorage.getItem(this.cartName);
    if(cart!=null){
      cart=JSON.parse(cart);   
      let tmp=[]; 
      

     cart.forEach(function(item,i){

      if(id==item.item_id){
           let discount=item.discount!=null?item.discount:0
          
           item.qty+=qty;
           
           if(item.qty<1)item.qty=1;            

           discount= item.discount*item.qty;
           item.total_discount=discount;
           item.subtotal=(item.qty*item.price)-(discount);
          
          // console.log(item);
           tmp.push(item);
         }else{

           tmp.push(item);
         }

     });

                
      localStorage.setItem(this.cartName, JSON.stringify(tmp));
    }
 }//end QtyUp


 itemExists(id){
    let found=0;
    let cart= localStorage.getItem(this.cartName);
    if(cart!=null){
      cart=JSON.parse(cart);                   
          

      cart.forEach(function(item,i){
        if(id==item.item_id){
          found=1;                
         }

      });


    }else{
      found=0;
    }

    return found;
 }//end itemExists

 delItem(id){
    let cart= localStorage.getItem(this.cartName);
    if(cart!=null){
      cart=JSON.parse(cart);   
      let tmp=[];  

     

    cart.forEach(function(item,i){
         if(id!=item.item_id){
          tmp.push(item);
         }
      });


      localStorage.setItem(this.cartName,JSON.stringify(tmp));
    }
 }//end delItem


 clearCart(){
      localStorage.removeItem(this.cartName);             
      localStorage.setItem(this.cartName, JSON.stringify([]));
    
 } //end clearCart




  
}//end class