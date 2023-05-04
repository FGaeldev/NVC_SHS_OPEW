let btn_submit = document.getElementById("submit_btn");
let input_form1 =   [ 
                    document.getElementById("sy"),
                    document.getElementById("IDno"),
                    document.getElementById("lrn"),
                    document.getElementById("fbus"),
                    document.getElementById("name"),
                    document.getElementById("month"),
                    document.getElementById("day"),
                    document.getElementById("year"),
                    document.getElementById("age"),
                    document.getElementById("num"),
                    document.getElementById("address"),
                    document.getElementById("zipcode"),
                    document.getElementById("zipcode"),
                    document.getElementById("elementary"),
                    document.getElementById("sy2"),
                    document.getElementById("jhs"),
                    document.getElementById("sy3"),
                    document.getElementById("shs"),
                    document.getElementById("sy4"),
                    document.getElementById("vacname"),
                    document.getElementById("dad_name"),
                    document.getElementById("dad_job"),
                    document.getElementById("dad_num"),
                    document.getElementById("dad_sal"),
                    document.getElementById("mom_name"),
                    document.getElementById("mom_job"),
                    document.getElementById("mom_num"),
                    document.getElementById("mom_sal")
                    ];
let result = "please fill out the form completely";
let trigger = true;
btn_submit.addEventListener('click', () => {
    for (i=0; i<=input_form1.length; i++){
        let value = input_form1[i].value.trim();
        if ( value.length == 0 ){
            alert(result);
            break
        }else if (i == 10){
            if (!isEmail(value)){
                break
            }
        }
        if(trigger == true){
            document.getElementById("formenroll").submit();
        }
    }
});