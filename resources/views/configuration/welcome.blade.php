@extends('layouts.configuration')

@section('content')
<div id="wizard">
  <!-- SECTION 1 -->
  <h4></h4>
  <section>
    <div class="container-fluid"> 
      <div class="col-md-10 offset-md-1">
        <p style="margin: 40px 0;">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique illum voluptate doloremque explicabo maiores deserunt provident odio, reiciendis expedita fugit atque doloribus cumque veniam molestias, in voluptatibus tempora, voluptatem et.
        </p>
        <ul>

        </ul>
      </div>
    </div>
  </section>
      
<!-- SECTION 2 -->
  <h4></h4>
  <section>
    <div class="container-fluid">  
      <div class="row">
        <h6 id="errorMsg" style="width: 90%; margin: 0 5%; text-align: center; padding-bottom: 20px;"></h6>
        <div class="col-md-6">
            <div class="form-group"> 
              <label>Database Connection</label>
              <select type="text" name="db_connection" id="db_connection" class="form-control" required>
                  <option value="" selected hidden>-- Select Database Connection --</option>
                  <option value="mysql">MySQL Database</option>
                  <option value="postgres">Postgres SQL Database</option>
              </select>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group"> 
              <label>Host</label>
              <input type="text" name="db_host" id="db_host" placeholder="Enter host IP eg. 127.0.0.1" class="form-control" autocomplete="off" required=""> 
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group"> 
            <label>Port</label>
            <input type="text" name="db_port" id="db_port" placeholder="Enter port number eg. 3306" class="form-control" autocomplete="off" required=""> 
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group"> 
            <label>Database</label>
            <input type="text" name="db_name" id="db_name" placeholder="Enter database name" class="form-control" autocomplete="off" required=""> 
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group"> 
            <label>Username</label>
            <input type="text" name="db_admin_username" id="db_admin_username" placeholder="Enter database admin username" class="form-control" autocomplete="off" required=""> 
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group"> 
            <label>Password</label>
            <input type="password" name="db_password" id="db_password" placeholder="Enter database admin password" class="form-control" autocomplete="off" required=""> 
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION 3 -->
  <h4></h4>
  <section>
      <div class="container-fluid">  
          <div class="row">
            <div class="col-md-6">
                <div class="form-group"> 
                    <label>Administrator Name</label>
                    <input type="text" name="cms_admin_name" id="cms_admin_name" placeholder="CMS administrator name" class="form-control" autocomplete="off" required=""> 
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> 
                <label>Email</label>
                <input type="email" name="cms_admin_email" id="cms_admin_email" placeholder="CMS administrator email" class="form-control" autocomplete="off" required=""> 
              </div>
            </div>
          </div>
    
          {{-- <div class="row">
            <div class="col-md-6">
              <div class="form-group"> 
                <label>Phone</label>
                <input type="text" name="" placeholder="" class="form-control" autocomplete="off" required=""> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> 
                <label>Password</label>
                <input type="text" name="" placeholder="" class="form-control" autocomplete="off" required=""> 
              </div>
            </div>
          </div> --}}
    
          <div class="row">
            <div class="col-md-6">
              <div class="form-group"> 
                <label>Password</label>
                <input type="password" name="cms_password" id="cms_password" placeholder="Administrator password" class="form-control" autocomplete="off" required=""> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> 
                <label>Confirm Password</label>
                <input type="password" name="cms_confirm_password" id="cms_confirm_password" placeholder="Confirm administrator password" class="form-control" autocomplete="off" required=""> 
              </div>
            </div>
          </div>
        </div>
  </section>

  <!-- SECTION 4 -->
  <h4></h4>
  <section>
      <div class="container-fluid"> 
        <div class="row">
            <div class="summary--table">
              <div class="summary--table-row">
                <div class="summary--table-cell">
                  <h5>Database Configuration Summary</h5>
                </div >
              </div>
              <div class="summary--table-row">
                <div class="summary--table-cell">
                  <table class="summary-table">
                    <tr>
                      <td class="bold">Connection</td>
                      <td id="connection_name"></td>
                    </tr>
                    <tr>
                      <td class="bold">Host</td>
                      <td id="host_name"></td>
                    </tr>
                    <tr>
                      <td class="bold">Port</td>
                      <td id="port_number"></td>
                    </tr>
                    <tr>
                      <td class="bold">Database</td>
                      <td id="database_name"></td>
                    </tr>
                    <tr>
                      <td class="bold">Username</td>
                      <td id="username_db_user"></td>
                    </tr>
                    {{-- <tr>
                      <td class="bold">Password</td>
                      <td id="password_db_user"></td>
                    </tr> --}}
                  </table>
                </div >
              </div>
              <div class="summary--table-row">
                <div class="summary--table-row">
                  <div class="summary--table-cell">
                    <h5 style="padding-top: 40px;">Admin User Summary</h5>
                  </div >
                </div>
              </div>
              <div class="summary--table-row">
                <div class="summary--table-cell">
                  <table class="summary-table">
                    <tr>
                      <td class="bold">Full name</td>
                      <td id="cms_admin_user_fullname"></td>
                    </tr>
                    <tr>
                      <td class="bold">Email</td>
                      <td id="cms_admin_user_email"></td>
                    </tr>
                  </table>
                </div >
              </div>
            </div>
        </div>
      </div>
  </section>
</div>
</form>
</div>
@endsection

<script>
  window.onload = function() {

    if (getByID('db_host')) {
      getByID('db_host').addEventListener('input', getInputValidationStatus);
    }

    if (getByID('db_connection')) {
      getByID('db_connection').addEventListener('change', performChangeActionsForConnectionElement);
    }
  }
</script>