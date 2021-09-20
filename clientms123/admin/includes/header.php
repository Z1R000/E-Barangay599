<div class="header-section" style="font-family: bahnschrift light;">
<img class="1" src="images/barangay.png" style="width: 8%; position: absolute;">
<p style="padding-top: 10px;color: black;text-align: center; font-size: 1.25em; font-weight: 600;">BARANGAY 599, ZONE 59, DISTRICT VI<br>OFFICE OF THE SANGGUNIANG BARANGAY<br><span style="font-size: 0.8em; font-style: italic;">#4745 Peralta St., V. Mapa Sta. Mesa, Manila<br>Tel. #722-9743</span></p>
<img class="2" src="images/Maynila.png" style="width: 8%; position: absolute; top: 0%; right: 1%;">
<br>
        <!--menu-right-->
        <div class="top_menu">
          
          <!--/profile_details-->
          <div class="profile_details_left">
            <ul class="nofitications-dropdown">
              <li class="dropdown note dra-down">
                
                <script type="text/javascript">

                  function DropDown(el) {
                    this.dd = el;
                    this.placeholder = this.dd.children('span');
                    this.opts = this.dd.find('ul.dropdown > li');
                    this.val = '';
                    this.index = -1;
                    this.initEvents();
                  }
                  DropDown.prototype = {
                    initEvents : function() {
                      var obj = this;

                      obj.dd.on('click', function(event){
                        $(this).toggleClass('active');
                        return false;
                      });

                      obj.opts.on('click',function(){
                        var opt = $(this);
                        obj.val = opt.text();
                        obj.index = opt.index();
                        obj.placeholder.text(obj.val);
                      });
                    },
                    getValue : function() {
                      return this.val;
                    },
                    getIndex : function() {
                      return this.index;
                    }
                  }

                  $(function() {

                    var dd = new DropDown( $('#dd') );

                    $(document).click(function() {
                        ;
                                });

                  });

                </script>
				
              </li>
				
			                  
              <div class="clearfix"></div>  
            </ul>
          </div>
          <div class="clearfix"></div>  
          <!--//profile_details-->
        </div>
        <!--//menu-right-->
        <div class="clearfix"></div>
	</div>