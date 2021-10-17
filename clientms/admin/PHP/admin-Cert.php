<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>
       .btn_round {
  width: 35px;
  height: 35px;
  display: inline-block;
  border-radius: 50%;
  text-align: center;
  line-height: 35px;
  margin-left: 10px;
  border: 1px solid #ccc;
  cursor: pointer;
}
.btn_round:hover {
  color: #fff;
  background: #6b4acc;
  border: 1px solid #6b4acc;
}

.btn_content_outer {
  display: inline-block;
  width: 85%;
}
.close_c_btn {
  width: 30px;
  height: 30px;
  position: absolute;
  right: 10px;
  top: 0px;
  line-height: 30px;
  border-radius: 50%;
  background: #ededed;
  border: 1px solid #ccc;
  color: #ff5c5c;
  text-align: center;
  cursor: pointer;
}

.add_icon {
  padding: 10px;
  border: 1px dashed #aaa;
  display: inline-block;
  border-radius: 50%;
  margin-right: 10px;
}
.add_group_btn {
  display: flex;
}
.add_group_btn i {
  font-size: 32px;
  display: inline-block;
  margin-right: 10px;
}

.add_group_btn span {
  margin-top: 8px;
}
.add_group_btn,
.clone_sub_task {
  cursor: pointer;
}

.sub_task_append_area .custom_square {
  cursor: move;
}

.del_btn_d {
  display: inline-block;
  position: absolute;
  right: 20px;
  border: 2px solid #ccc;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  line-height: 40px;
  text-align: center;
  font-size: 18px;
}
    </style>
  </head>
  <body>
   <!--<div class="container-fluid">
      <ul class="nav nav-tabs">
         <li class="nav-item"><a  class="nav-link active"data-bs-toggle = "tab" href="#one">one</a></li>
         <li class="nav-item"><a  class="nav-link "data-bs-toggle = "tab" href="#two">two</a></li>
         <li class="nav-item"><a href="" class="nav-link ">Tree</a></li>
      </ul>
      <div class="tab-content" >
         <div class="tab-pane active" id = "one">
            <div class="row">
               <div class="col p-4">
                     ukinanam
               </div>
            </div>
         </div>
     
      
         <div class="tab-pane" id = "two">
            <div class="row">
               <div class="col p-4">
                     3000
               </div>
            </div>
         </div>
         </div>
   </div>-->
   <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
   <div class="container py-4">
  <div class="row">
    <div class="col-md-12 form_sec_outer_task border">
      <div class="row">
        <div class="col-md-12 bg-light p-2 mb-3">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <h4 class="frm_section_n">Form Title</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <label>Mobile No.</label>
        </div>
        <div class="col-md-4">
          <label> Type </label>
        </div>
      </div>
      <div class="col-md-12 p-0">
        <div class="col-md-12 form_field_outer p-0">
          <div class="row form_field_outer_row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control w_90" name="mobileb_no[]" id="mobileb_no_1" placeholder="Enter mobiel no." />
            </div>
            <div class="form-group col-md-4">
              <select name="no_type[]" id="no_type_1" class="form-control">
                <option>--Select type--</option>
                <option>Personal No.</option>
                <option>Company No.</option>
                <option>Parents No.</option>
              </select>
            </div>
            <div class="form-group col-md-2 add_del_btn_outer">
              <button class="btn_round add_node_btn_frm_field" title="Copy or clone this row">
                <i class="fas fa-copy"></i>
              </button>

              <button class="btn_round remove_node_btn_frm_field" disabled>
                <i class="fas fa-trash-alt"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row ml-0 bg-light mt-3 border py-3">
      <div class="col-md-12">
        <button class="btn btn-outline-lite py-0 add_new_frm_field_btn"><i class="fas fa-plus add_icon"></i> Add New field row</button>
      </div>
    </div>
  </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
       ///======Clone method
      $(document).ready(function () {
      $("body").on("click", ".add_node_btn_frm_field", function (e) {
         var index = $(e.target).closest(".form_field_outer").find(".form_field_outer_row").length + 1;
         var cloned_el = $(e.target).closest(".form_field_outer_row").clone(true);

         $(e.target).closest(".form_field_outer").last().append(cloned_el).find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false);

         $(e.target).closest(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true);

         //change id
         $(e.target)
            .closest(".form_field_outer")
            .find(".form_field_outer_row")
            .last()
            .find("input[type='text']")
            .attr("id", "mobileb_no_" + index);

         $(e.target)
            .closest(".form_field_outer")
            .find(".form_field_outer_row")
            .last()
            .find("select")
            .attr("id", "no_type_" + index);

         console.log(cloned_el);
         //count++;
      });
      });   
      $(document).ready(function(){ $("body").on("click",".add_new_frm_field_btn", function (){ console.log("clicked"); var index = $(".form_field_outer").find(".form_field_outer_row").length + 1; $(".form_field_outer").append(`
      <div class="row form_field_outer_row">
      <div class="form-group col-md-6">
         <input type="text" class="form-control w_90" name="mobileb_no[]" id="mobileb_no_${index}" placeholder="Enter mobiel no." />
      </div>
      <div class="form-group col-md-4">
         <select name="no_type[]" id="no_type_${index}" class="form-control">
            <option>--Select type--</option>
            <option>Personal No.</option>
            <option>Company No.</option>
            <option>Parents No.</option>
         </select>
      </div>
      <div class="form-group col-md-2 add_del_btn_outer">
         <button class="btn_round add_node_btn_frm_field" title="Copy or clone this row">
            <i class="fas fa-copy"></i>
         </button>

         <button class="btn_round remove_node_btn_frm_field" disabled>
            <i class="fas fa-trash-alt"></i>
         </button>
      </div>
      </div>
      `); $(".form_field_outer").find(".remove_node_btn_frm_field:not(:first)").prop("disabled", false); $(".form_field_outer").find(".remove_node_btn_frm_field").first().prop("disabled", true); }); });

      $(document).ready(function () {
      //===== delete the form fieed row
      $("body").on("click", ".remove_node_btn_frm_field", function () {
         $(this).closest(".form_field_outer_row").remove();
         console.log("success");
      });
      });
    </script>
    
  </body>
</html>