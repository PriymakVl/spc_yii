<style type="text/css">
   #checkout input[type="text"], #checkout textarea {
      width: 550px;
   }
</style>

<div class="modal" id="checkout">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Оформить заказ</h4>
      </div>
    
   <form>
      <!-- Modal body -->
      <div class="modal-body">
         <!-- name -->
         <div class="form-group">
            <label for="name">Ваше имя:</label>
            <input type="text" class="form-control input-sm" id="name" name="name">
         </div>
         <!-- email -->
         <div class="form-group">
            <label for="email">Ваше email:</label>
            <input type="text" class="form-control input-sm" id="email" name="email">
         </div>
         <!-- phone customer -->
         <div class="form-group">
            <label for="phone">Ваше email:</label>
            <input type="text" class="form-control input-sm" id="phone" name="phone">
         </div>
         <!-- comment -->
         <div class="form-group">
            <label for="comment">Коментарий к заказу:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
         </div> 
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Отправить">
      </div>
   </form>
      

    </div>
  </div>
</div>