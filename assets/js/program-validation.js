function validate_form() {
    program = document.getElementsByName("program")[0];
    effectiveYear = document.getElementsByName("effective_year")[0];
    poCode = document.getElementsByName("po_code[]");
    poAttrb = document.getElementsByName("po_attrib[]");
    poDesc = document.getElementsByName("po_desc[]");
    coCode = document.getElementsByName("co_code[]");
    coDesc = document.getElementsByName("co_desc[]");

    if( program.value == "" ) {
        alert("Please select a Program.");
        return false;
    }
    else if( effectiveYear.value == "" ) {
        alert("Please select Effective Year.");
        return false;
    }
    
    for ( var i = 0; i < poCode.length; i++ ) {
        if ( poCode[i].value == "" ) {
            alert("Please fill all PO Code fields.");

            return false;
        }
    }

    for ( var i = 0; i < poAttrib.length; i++ ) {
        if ( poAttrib[i].value == "" ) {
            alert("Please fill all PO Attribute fields.");

            return false;
        }
    }

    for ( var i = 0; i < poDesc.length; i++ ) {
        if ( poDesc[i].value == "" ) {
            alert("Please fill all PO Description fields.");

            return false;
        }
    }

    for ( var i = 0; i < coCode.length; i++ ) {
        if ( coCode[i].value == "" ) {
            alert("Please fill all Course Code fields.");

            return false;
        }
    }

    for ( var i = 0; i < coDesc.length; i++ ) {
        if ( coDesc[i].value == "" ) {
            alert("Please fill all Course Description fields.");

            return false;
        }
    }
}