class CartArray {
  
    constructor() {
      this.arraycart=[];   
    }
  
    // ==========Methods============
  
    getCart(){      
      return this.arraycart;
     }//end getCart
  
    save(item){   
       
          this.arraycart.push(item);
        
      
    }//end save
  
  
   clearCart(){
      this.arraycart=[];
      
   } //end clearCart
  
  
    
  }//end class