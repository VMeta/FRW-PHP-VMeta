<!DOCTYPE html>
<html>
<head>
	<title>VMeta PHP-ORM</title>
	<link rel="stylesheet" type="text/css" href="Database/Config/ORM/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Database/Config/ORM/fonts/font-awesome.min.css">

	<style type="text/css">
	.bg-faded {
	    background-color: #5CB85C;
	}
	.navbar-brand {
   		float: none;
   		color: orange !important;
    }
    .tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative
}
.tree ul ul {
    margin-left:.5em
}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0 1em;
    line-height:2em;
    color:#369;
    font-weight:700;
    position:relative
}
.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:-1px;
    position:absolute;
    top:1em;
    left:0
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
}
.tree li a {
    text-decoration: none;
    color:#369;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
}
	</style>
</head>
<body>

	<nav class="navbar navbar-light bg-faded">
	  <center><br><a class="navbar-brand" href="#">VMeta PHP-ORM</a><br><br></center>
	</nav>

	<div class="container">
		<div class="row">
			<br>
			<br>
			<br>
		 	<div class="col-sm-12">
				<center><input type="submit" class="btn btn-success" name="createAll" id="createAll" value="Create All +"></center>
		 	</div>
		</div>
		<div class="row">
			<div class="col-sm-12" id="info">
				<div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-4">
            <ul id="tree2">
                <li><a href="#">TECH</a>

                    <ul>
                        <li>Company Maintenance</li>
                        <li>Employees
                            <ul>
                                <li>Reports
                                    <ul>
                                        <li>Report1</li>
                                        <li>Report2</li>
                                        <li>Report3</li>
                                    </ul>
                                </li>
                                <li>Employee Maint.</li>
                            </ul>
                        </li>
                        <li>Human Resources</li>
                    </ul>
                </li>
                <li>XRP
                    <ul>
                        <li>Company Maintenance</li>
                        <li>Employees
                            <ul>
                                <li>Reports
                                    <ul>
                                        <li>Report1</li>
                                        <li>Report2</li>
                                        <li>Report3</li>
                                    </ul>
                                </li>
                                <li>Employee Maint.</li>
                            </ul>
                        </li>
                        <li>Human Resources</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
		 	</div>
		</div>
	</div>

	<script type="text/javascript" src="Database/Config/ORM/js/jquery-2.1.1.min.js" ></script>
	<script type="text/javascript" src="Database/Config/ORM/js/bootstrap.min.js" ></script>

	<script type="text/javascript">
		$("#createAll").on("click", function(e){
			e.preventDefault();
			$.ajax({
				url: "Database/Config/initial.php",
				type: "post",
				data: {"createAll" : "any"}, 
				success: function(data){
					$("#info").html(data);
				}
			})
		});
		$.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

//Initialization of treeviews

$('#tree1').treed();

$('#tree2').treed({openedClass:'glyphicon-folder-open', closedClass:'glyphicon-folder-close'});

$('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});
	</script>
</body>
</html>