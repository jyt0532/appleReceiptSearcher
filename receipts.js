(function(){
  var self = this;
  $('#status-img').hide();
  $("#get-receipt-btn").click(function(){
    $('tr:not(:first-child)').remove();
    $('#status-text').empty();
    $.ajax({
      url: "receipts.php"
      , type: 'post'
      , dataType: 'json'
      , data: {
        receipt: $( "#receipt" ).val()
      }
      , beforeSend: function() { $('#status-img').show();  }
      , complete: function() { $('#status-img').hide();  }
      , error: function(response){
        $("#status-text").text("receipt not found");
      }
      , success:function(result){
        self.renderReceipt(result.receipt);
      }
    });
  });
})();
function renderReceipt(receipt){
   for(var key in receipt){
    if(receipt.hasOwnProperty(key)){
      $("#status-table").append(
        "<tr>"
        + "<td>"
        + key
        + "</td>"
        + "<td>"
        + receipt[key]
        + "</td>"
        + "</tr>"
      ); 
    }
  }
}

