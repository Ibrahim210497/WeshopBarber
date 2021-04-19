<div class="container bg-light">
<form class="row g-3">
    <div class="col-md-4">
        <label for="validationServer01" class="form-label">Nom </label>
        <input type="text" name="nom" class="form-control is-valid" id="validationServer01" value="Mark" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationServer02" class="form-label">Prenom</label>
        <input type="text"name="prenom" class="form-control is-valid" id="validationServer02" value="Otto" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>

    <div class="col-md-4">
        <label for="validationServerUsername" class="form-label">adresse mail</label>
        <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend3">@</span>
            <input type="text" name="login" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <label for="validationServer03" class="form-label">Password</label>
        <input type="text" name="pass_clt" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
        <div id="validationServer03Feedback" class="invalid-feedback">
            Please provide a valid password.
        </div>
    </div>
    <div class="col-md-6">
        <label for="validationServer03" class="form-label">Rue</label>
        <input type="text" name="rue" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required>
        <div id="validationServer03Feedback" class="invalid-feedback">
            Please provide a valid city.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer04" class="form-label">Code postal</label>
        <select class="form-select is-invalid" name="cp" id="validationServer04" aria-describedby="validationServer04Feedback" required>
            <option selected disabled value="">Choose...</option>
            <option>...</option>
        </select>
        <div id="validationServer04Feedback" class="invalid-feedback">
            Please select a valid state.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer05" class="form-label">Localité</label>
        <input type="text" name="localité" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
        <div id="validationServer05Feedback" class="invalid-feedback">
            Please provide a valid zip.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer05" class="form-label">télephone</label>
        <input type="text" name="tel" class="form-control is-invalid" id="validationServer05" aria-describedby="validationServer05Feedback" required>
        <div id="validationServer05Feedback" class="invalid-feedback">
            Please provide a valid tel.
        </div>
    </div>


    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
            <label class="form-check-label" for="invalidCheck3">
                Agree to terms and conditions
            </label>
            <div id="invalidCheck3Feedback" class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit form</button>
    </div>
</form>
</div>