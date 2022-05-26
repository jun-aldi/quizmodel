<?=$this->extend("layout/master")?>

<?=$this->section("content")?>

<section>
          <h1>GeeksForGeeks</h1>
    
          <table id="table">
                <tr>
                  <th>id</th>
                  <th>fasilitas</th>
                  <th>foto</th>
                  <th>deskripsi</th>
              </tr>
          </table>
</section>

<script>
                  $(document).ready(function () {
    
                      // FETCHING DATA FROM JSON FILE
                      $.getJSON("http://devel.crissad.com/api/fasilitas", 
                              function (data) {
                          var student = '';
    
                          // ITERATING THROUGH OBJECTS
                          $.each(data, function (key, value) {
    
                              //CONSTRUCTION OF ROWS HAVING
                              // DATA FROM JSON OBJECT
                              student += '<tr>';
                              student += '<td>' + 
                                  value.id + '</td>';

                            student += '<td>' + 
                                  value.fasilitas + '</td>';

                              student += '<td>' + '<img src="'+ value.foto +'" alt="" srcset="">'
                                   + '</td>';
    
                              student += '<td>' + 
                                  value.deskripsi + '</td>';
    
                              student += '</tr>';
                          });
                            
                          //INSERTING ROWS INTO TABLE 
                          $('#table').append(student);
                      });
                  });
</script>
      
<?=$this->endSection()?>





