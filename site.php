<!doctype html>
<html lang="en">
<head>


  <link rel="stylesheet" href="css/bootstrap.css" >
  <link rel="stylesheet" href="css/estilos.css" >

  <script src="js/jquery.min.js" type='text/javascript'></script>
  <script src="js//underscore-min.js" type='text/javascript'></script>
  <script src='js/jquery.mentionsInput.js' type='text/javascript'></script>
  <script src="js/jquery.elastic.js"></script>

  <script>
    if(window.jQuery) {
        console.log('jQuery loaded');
    } else {
        console.log('jQuery NOT loaded');
    }
    if(window._) {
        console.log('_ loaded');
    } else {
        console.log('_ NOT loaded');
    }

    console.log($('textarea.mention'));

    $(function () {
    
        $('.mention').mentionsInput({
            onDataRequest:function (mode, query, callback) {
                var data = [
                    { id:1, name:'Kenneth Auchenberg', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
                    { id:2, name:'Jon Froda', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
                    { id:3, name:'Anders Pollas', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
                    { id:4, name:'Kasper Hulthin', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
                    { id:5, name:'Andreas Haugstrup', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
                    { id:6, name:'Pete Lacey', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
                    { id:7, name:'kenneth@auchenberg.dk', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
                    { id:8, name:'Pete Awesome Lacey', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' },
                    { id:9, name:'Kenneth Hulthin', 'avatar':'http://cdn0.4dots.com/i/customavatars/avatar7112_1.gif', 'type':'contact' }
                ];
    
                data = _.filter(data, function(item) { return item.name.toLowerCase().indexOf(query.toLowerCase()) > -1 });
                callback.call(this, data);
            }
        });
    
       
    
    });
  
  </script>
</head>
<body>
  <textarea class="mention"></textarea>


  <script src="jquery-3.2.1.slim.min.js"></script>
  
</body>
</html>