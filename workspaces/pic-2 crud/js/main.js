$(document).ready(function (){
    window.ids    = [];
    window.names  = [];
    window.orders = [];
    window.countId = 1;
    
    $("#btn-exampleModal2").hide();
    //start insert table
    function loadPage(){
    $("body").html('<table class="table table-inverse"><thead><tr><th>#</th><th>Name</th><th>Order</th><th><button type="button" class="btn btn-primary btn-sm">+ Add</button></th></tr>');
    }
    //end insert table
    
    //start push data from arrays
    function insertTd(){
    for(var i = 0; i <ids.length; i++){
    $("tbody").append('<tr><th scope="row">'+ids[i]+'</th><td>'+names[i]+'</td><td>'+orders[i]+'</td><td><button type="button" id="'+ids[i]+'" class="btn btn-warning btn-sm">Update</button>   <button type="button" id="'+ids[i]+'" class="btn btn-danger btn-sm">Delete</button></td></tr>');  
    }
    }
    insertTd();
    //end push data from arrays
    //start function insert new data
    $("#submit").on("click",function (){
    names.push($("#name").val());
    orders.push($("#order").val());
    var numId = ids.length+1;
    var numIdS = toString(numId);
    ids[ids.length] = countId.toString();
    window.countId++;
    $("#close").trigger("click");
    $("tbody").html("");
    insertTd();
    btnUpdate();
    btnDelete();
    return false;
    })
    //end function insert new data
    
    //start function btn with update
    function btnUpdate(){
    $(".btn.btn-warning").on("click",function (){
    $("#btn-exampleModal2").trigger("click");
      window.tdId = $(this).attr("id");
      window.index = ids.indexOf(tdId);
      var tdName = $(this).parents("tr").find("td:first").html();
      var tdOrder = $(this).parents("tr").find("td:first").next().html();
    $("#nameupdate").val(tdName);
    $("#orderupdate").val(tdOrder);       
    submitUpdate();
    btnDelete();
    btnUpdate();  
    })
    }
    //start function update by arrays 
    function submitUpdate(){
    $("#submit2").on("click",function (){
    //start update by arrays
    ids[index]    = tdId.toString();
    names[index]  = $("#nameupdate").val();
    orders[index] = $("#orderupdate").val();
    //end update by arrays
    $("#close2").trigger("click");
    $("tbody").html("");
    insertTd();
    submitUpdate();
    btnUpdate();
    btnDelete();
    return false; 
    })
    }
    // start function btn delete data
    function btnDelete(){
    $(".btn.btn-danger").on("click",function(){
     var id = $(this).attr("id");
     var index = ids.indexOf(id); 
      ids.splice(index,1);
      names.splice(index,1);
      orders.splice(index,1);
      $("tbody").html("");
      insertTd();
      btnUpdate();
      submitUpdate();
      btnDelete();
    })
    }
    btnDelete();
    // end function btn delete data
    btnUpdate();
    submitUpdate();
    //end function update by arrays
    //end function btn with update
    })