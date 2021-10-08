function selectLocation() {
    
    document.getElementById('tables').style.visibility = "visible";

    var selectedLoc = document.getElementById('location').value;

    $.ajax({

        url: "CrowdAdvisorShowResultA.php",
        method: 'POST',
        data:{
            id : selectedLoc
        },
        success:function(data){
            $("#resultA").html(data);
        }
    })

    $.ajax({

        url: "CrowdAdvisorShowResultB.php",
        method: 'POST',
        data:{
            id : selectedLoc
        },
        success:function(data){
            $("#resultB").html(data);
        }
    })

    $.ajax({

        url: "CrowdAdvisorShowResultC.php",
        method: 'POST',
        data:{
            id : selectedLoc
        },
        success:function(data){
            $("#resultC").html(data);
        }
    })

    $.ajax({

        url: "CrowdAdvisorShowResultD.php",
        method: 'POST',
        data:{
            id : selectedLoc
        },
        success:function(data){
            $("#resultD").html(data);
        }
    })

}