function set_action() {

    var action_for_script = document.getElementById('property');
    if(action_for_script.value === '2') {
        document.getElementById('form-section-room').style.display = "block";
        document.getElementById('form-section-house').style.display = "none";
        document.getElementById('form-section').style.display = "none";
        document.getElementById('form-section-land').style.display = "none";
    }
    else if(action_for_script.value === '1') {
        document.getElementById('form-section-house').style.display = "none";
        document.getElementById('form-section').style.display = "block";
        document.getElementById('form-section-land').style.display = "none";
        document.getElementById('form-section-room').style.display = "none";
    }
    else if(action_for_script.value === '3') {
        document.getElementById('form-section-house').style.display = "block";
        document.getElementById('form-section-land').style.display = "none";
        document.getElementById('form-section').style.display = "none";
        document.getElementById('form-section-room').style.display = "none";
    }
    else {
        document.getElementById('form-section-land').style.display = "block";
        document.getElementById('form-section-house').style.display = "none";
        document.getElementById('form-section').style.display = "none";
        document.getElementById('form-section-room').style.display = "none";
    }
}

function set_action1() {

    action_for_script = document.getElementById('property1');
    if(action_for_script.value ==='2') {
        document.getElementById('form-section-house1').style.display = "block";
        document.getElementById('form-section1').style.display = "none";   
    }
    if(action_for_script.value ==='1') {
        document.getElementById('form-section-house1').style.display = "none";
        document.getElementById('form-section1').style.display = "block";
    }
}

function selectRoom() {
   
    
}

function selectHouse() {
    
   
}

function selectLand() {
  
    
}
