

function GetCarsBySearch() {
  var choose = document.getElementById('s_name').value;
  var datepick = document.getElementById('chkin').value;
  var datepickout = document.getElementById('chkout').value;
  var typecarx = document.getElementById('discar').selectedIndex;
  var typecary = document.getElementById('discar').options;
  var modelyear = document.getElementById('mdy');
  var prices = document.getElementById('myRange').value;
  var jsonData = '';
  var data = '' ;
  var cover_url = "http://localhost/demo/cover_gallery/" ;
  var url = 'http://localhost/demo/index.php/api/car/cars';
  var xhttp = new XMLHttpRequest();
  xhttp.open('GET', url, true);
  var con_l = choose.trim().length > 0; /* check if input is location */
  var con_t = typecarx > 0;             /* check if input is type of car */
  var con_m = modelyear.selectedIndex > 0; /* check if input is model year */
  var con_s = datepick.trim().length >0; /* check if input is start date */
  var con_e =datepickout.trim().length >0; /* check if input is end date */
  var con_p = prices > 0;
  if (window.location.href == 'http://localhost/demo/index.php/search/search_engine'){
  // begin search case
      if ((con_l || con_t || con_m || con_s || con_e || con_p)) {
        //console.log("run11");

        xhttp.onreadystatechange = function() {
          document.getElementById('resultss').innerHTML = '';
          if (xhttp.readyState == 4 && xhttp.status == 200) {
            //console.log("run");

            jsonData = JSON.parse(xhttp.responseText);
            for (x in jsonData) {
              //console.log("run1");
              con_t ? t = (jsonData[x].type_of_car.toLowerCase() == typecary[typecarx].text.toLowerCase()) : t = true;
              con_l ? l = jsonData[x].city.trim().toLowerCase().match(choose.trim().toLowerCase()) : l = true;
              con_m ? m = jsonData[x].year >= modelyear.value : m = true;
              con_s ? s = jsonData[x].start_date <= datepick : s = true;
              con_e ? e = jsonData[x].end_date >= datepickout : e = true;
              con_p ? p = jsonData[x].price <= parseInt(prices) : p = true;
              //console.log("run 2 " +t + l + m + s + e + p);
              if(t && l && m && s && e && p) {
              //console.log(t + l + m + s + e + p);
                  data = '<div class="col-sm-6 text-center">' ;
                  data+= '<p><b>'+ jsonData[x].title + '</b></p><br>'+
                         '<img src="' + cover_url + jsonData[x].cover_photo +'" style="width:150px; height:150px">' +
                         '<br><br></div>' ;
                  data = data.link("../Reserve/reserves/"+ jsonData[x].carID) ;
                  data += '</div>' ;
                  document.getElementById('resultss').innerHTML += data;
              }
            }
          }
        };
        xhttp.send();
      }
  // end search case

      // else display all
      else {
          xhttp.onreadystatechange = function() {
            document.getElementById('resultss').innerHTML = '';
            if (xhttp.readyState == 4 && xhttp.status == 200) {
              jsonData = JSON.parse(xhttp.responseText);
              for (x in jsonData){
                data = '<div class="col-sm-6 text-center">' ;
                data+=
                       '<b>'+ jsonData[x].title + '</b></button><br>'+
                       '<img src="' + cover_url + jsonData[x].cover_photo +'" style="width:150px; height:150px">' +
                       '<br><br>'
                       ;
                data = data.link("../Reserve/reserves/"+ jsonData[x].carID) ;
                data += '</div>';
                document.getElementById('resultss').innerHTML += data;
              }
            }
          };
          xhttp.send();
      }
        // end else display all

  }
  else {
    choose = "oulu";
    window.location.assign('http://localhost/car/index.php/search/search_engine');
  }
}
