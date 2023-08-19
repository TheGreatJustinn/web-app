  <!-- Services -->
  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Services.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>We are a On Demand service that focus on what's best for your home and what's best for you!</p>
	<div class="w3-row-padding w3-grayscale">
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="{{URL('images/install.png')}}" alt="Installation" style="width:20%">
        <div class="w3-container">
          <h3>Installation</h3>
          <li>Bathrooms</li>
		  <li>Floors</li>
		  <li>Countertops</li>
		  <li>Vanities</li>
		  <li>And Much More…</li>
        </div>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="{{URL('images/repair.png')}}" alt="Repair" style="width:20%">
        <div class="w3-container">
          <h3>Repair</h3>
          <p>Interior</p>
		  <li>Attic Insulation</li>
		   <li>Garbage Disposal Repair/Replacement</li>
		    <li>Sink Repair/ Replacement</li>
			 <li> Door Installation/ Replacement </li>
			  <li>And Much More…</li>
		  <br>
		  <p> Exterior <p>
		   <li>Gutter Drain Pipe</li> 
		   <li>Gutter Guards</li>
		   <li>Window Repair/Replacement</li>
		   <li>Power washing entire exterior of home</li>
		   <li>And Much More…</li>
		   
        </div>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="{{URL('images/paint.png')}}" alt="Painting" style="width:20%">
        <div class="w3-container">
          <h3>Painting</h3>
		  <li>Paint Touch-Ups </li>
		  <li>Painting Walls/Trim</li>
        </div>
      </div>
    </div>
	 <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="{{URL('images/carpentry.png')}}" alt="Carpentry" style="width:20%">
        <div class="w3-container">
          <h3>Carpentry</h3>
          <li> Lay Cement and Walkways </li>
		  <li> Leveling Ground To Foundation </li>
		  <li>Install Drywall</li>
		  <li>Preparing Homes For Sale</li>
		  <li>And Much More…</li>
        </div>
      </div>
    </div>
	 <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="{{URL('images/other.png')}}" alt="Miscellaneous" style="width:20%">
        <div class="w3-container">
          <h3>Miscellaneous</h3>
        </div>
      </div>
    </div>
  </div>
  </div>
  
  <div class="w3-container" id="About" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>About.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    
    <h4>On Demand Service is your one-stop-shop for 
	a solution to a very wide range of home repairs and basic maintenance needs
    </h4><br>
    <h6><b>On Demand Service Crew</b>:</h6>
  </div>

  <!-- The Team -->
  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <!--<img src="/w3images/team2.jpg" alt="James" style="width:100%"> -->
        <div class="w3-container">
          <h3>James Page</h3>
          <p class="w3-opacity">CEO, Founder & Handyman</p>
          
        </div>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <div class="w3-container">
          <h3>Justin Page</h3>
          <p class="w3-opacity">Web Designer & Assistant</p>
        </div>
      </div>
    </div>
	
	<div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <div class="w3-container">
          <h3>Donny</h3>
          <p class="w3-opacity">Handyman & Electrician</p>
        </div>
      </div>
    </div>
	
  </div><div class="w3-col m4 w3-margin-bottom">
  <h3>Where We Are Located</h3>
      <div class="w3-light-grey">
        <div id="map" class="w3-container" style="height: 300px;">
          
          
        </div>
		<br><h4>Bowie, MD 20715</h4>
      </div>
    </div>


  
  <!-- Contact -->
  <div class="w3-container" id="contact" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Contact.</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <h4>Get in touch to discuss and schedule home improvement services here in the DC, MD AND VA area with us. 
	Please fill out the form below to have a consultant contact you at your convenience
	</h4>
	<h5>Or call us at 301-765-4500 </h5>
	
    <form id="Form" method="post" action="/checker.php"
	onsubmit= "showConfirmation()">
    @csrf
    @method('GET')
      <div class="w3-section">
        <label>Full Name</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
     <div class="w3-section">
				<label for= 'Street_address' id='Street_address'>Street Address</label><br>
				<input class="w3-input w3-border" type="text" name="Street_address" placeholder="Street address" required><br>
			</div>
			<div class="w3-section">
				<label for='City'>City</label><br>
				<input class="w3-input w3-border" type="text" name="city" onkeyup="showHint(this.value)">
				<p><span id="txtHint"></span></p>
			</div> <br>
						<div class="w3-section">
				<label for='State'>State</label><br>
		<select class="w3-input w3-border" id='state' name='state' required>
			<option value=''disabled selected></option>
			<option value='DC'>District Of Columbia</option>
			<option value='MD'>Maryland</option>
			<option value='VA'>Virginia</option>
			</select><br>
			<label for='zip'>Zip Code</label><br>
			<input type='number' name='zip' min='20000' max='24658'><br><br>
			<br>
			</div>
		
			<div class="w3-section">
			
			<br>
			<label for='phone'>Phone Number</label><br>
			<input class="w3-input w3-border" type='tel' name="phone" placeholder='123-456-7890' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' required>
			<br>
			<small>Format: 123-456-7890</small>
			<br><br>
			</div>
			<div class="w3-section">
			<label for= 'email'>Email</label><br>
			<input class="w3-input w3-border" type= 'email' name= 'email' placeholder ='johndoe@email.com' required >
		</div><br>
		<div class="w3-section">
		<label for = 'Service'>Service</label><br>
		<select class="w3-input w3-border" id='service' name='service' required>
			<option value=''disabled selected></option>
			<option value='1'>1. Installation</option>
			<option value='2'>2. Repair</option>
			<option value='3'>3. Carpentry</option>
			<option value='4'>4. Painting</option>
			<option value='5'>5. Miscellaneous</option>
			</select>
		</div>
	<br>
      <div class="w3-section">
        <label>Message</label>
        <input class="w3-input w3-border" type="text" name="message" placeholder ="Describe what you need" required>
      </div>
      <button type="submit" onclick="myFunction()" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom"
	  >Submit Form</button>
    </form>  


</body>