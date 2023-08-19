<!-- Showcase Pictures -->
<div class="w3-row-padding">
    <p>This showcase shows some of the before and afters of our projects. Hope you enjoy!</p>
      <div class="w3-half">
        <img src="{{URL('images/beforebathroom.jpg')}}" style="width:100%" onclick="onClick(this)" alt="Before Bathroom">
        <img src="{{URL('images/beforecounter.jpg')}}" style="width:100%" onclick="onClick(this)" alt="Before Kitchen Counter">
        <img src="{{URL('images/beforesink.jpg')}}" style="width:100%" onclick="onClick(this)" alt="Before Sink">
      </div>
  
      <div class="w3-half">
        <img src="{{URL('images/afterbathroom.jpg')}}" style="width:100%" onclick="onClick(this)" alt="After Bathroom">
        <img src="{{URL('images/aftercounter.jpg')}}" style="width:100%" onclick="onClick(this)" alt="After Counter">
        <img src="{{URL('images/aftersink.jpg')}}" style="width:100%" onclick="onClick(this)" alt="After Sink">
      </div>
    </div>
  
    <!-- Modal for full size images on click-->
    <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
      <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
      <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption"></p>
      </div>
    </div>