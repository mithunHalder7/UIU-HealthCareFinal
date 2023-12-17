<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+8mkz5f5PlFf3Fiu12M2g2by5pBskYYgB5cE" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="prescription.css">
  <title>Prescription</title>
</head>

<body>
  <?php include '../Global_Components/DoctorNavbar.php'; ?>
  <br>


  <div class="container mt-4">
    <form method="post" action="prescription_submission_form.php"> <!-- Replace your_php_script.php with your actual PHP script -->
      <div class="form-section">
        <div class="d-flex mb-2">
          <div class="me-2" style="width: 45%;">
            <label for="appointmentId" class="form-label">Select Appointment ID:</label>
            <select class="form-select" id="appointmentId" name="appointmentId" required>
              <option value="" disabled selected>Select Appointment ID</option>
            </select>
          </div>
        </div>
      </div>
      <hr style="width: 1180px;">
      <div class="form-section">
        <h3>Medicines</h3>
        <!-- Add your medicine fields here -->
        <div class="medicine-fields">
          <!-- Initial medicine and dosage fields -->
          <div class="d-flex mb-2">
            <div class="me-2" style="width: 45%;">
              <label for="medicine1" class="custom-label">Medicine</label>
              <select class="form-select custom-inputa" id="medicine1" name="medicines[]">
                <option value="" disabled selected>Select Medicine</option>
              </select>
              <button class="btn add-icon" type="button" onclick="addMedicineField()">
                <i class="fas fa-plus-circle"></i>
              </button>
            </div>
            <div class="me-2" style="width: 45%;">
              <label for="dosage${medicineCount}">Dosage</label>
              <input type="text" id="dosage${medicineCount}" class="form-control custom-inputa" placeholder="1 + 0 + 1" name="dosages[]">
            </div>

          </div>
        </div>
      </div>

      <hr style="width: 1180px;">
      <div class="form-section">
        <h3>Tests</h3>
        <!-- Add your test fields here -->
        <div class="tests-fields">
          <!-- Initial test field -->
          <div class="d-flex mb-2">
            <div class="me-2" style="width: 45%;">
              <label for="test1" class="custom-label">Test</label>
              <select id="test1" class="form-select custom-inputa" name="tests[]">
                <option value="" disabled selected>Select Test</option>
              </select>
              <button class="btn add-icon" type="button" onclick="addTestField()">
                <i class="fas fa-plus-circle"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <hr style="width: 1180px;">
      <div class="form-section">
        <!-- Add your general advice fields here -->
        <div class="advice-fields">
          <!-- Initial advice field -->
          <div class="d-flex mb-2">
            <div class="me-2" style="width: 100%;">
              <h3>General Advice</h3>
              <select id="generalAdvice1" class="form-select custom-inputa" name="generalAdvices[]">
                <option value="" disabled selected>Select General Advice</option>
              </select>
              <button class="btn add-icon" type="button" onclick="addAdviceField()">
                <i class="fas fa-plus-circle"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 100px;margin-right: 70px; margin-bottom: 100px;">
        <button class="btn btn-primary me-md-2" type="submit" style="background-color: #F99417; border: none;">Cancel</button>
        <button class="btn btn-primary" type="submit" style="background-color: #F99417;border:none">Save changes</button>
      </div>
    </form>
  </div>













  <div class="footer text-center bg-custom-footer" style="width: 100%;">
    <p>Powered by S.E.M.D <br>&copy; 2023 United International University. <br>All rights reserved.</p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Fetch appointment IDs using AJAX on page load
      fetchAppointmentIds();
    });

    function fetchAppointmentIds() {
      const selectElement = document.getElementById('appointmentId');

      // Fetch appointment IDs using AJAX
      fetch('fetch_appointment_ids.php')
        .then(response => response.json())
        .then(data => {
          // Populate the select options
          data.forEach(appointment => {
            const option = document.createElement('option');
            option.value = appointment.appointment_id;
            option.textContent = appointment.appointment_id;
            selectElement.appendChild(option);
          });
        })
        .catch(error => console.error('Error fetching appointment IDs:', error));
    }
  </script>
  <script>
    let medicineCount = 1;

    function addMedicineField() {
      medicineCount++;

      const medicineFields = document.querySelector('.medicine-fields');

      // Create new medicine and dosage fields
      const newFields = document.createElement('div');
      newFields.classList.add('d-flex', 'mb-2');

      newFields.innerHTML = `
            <div class="me-2" style="width: 45%;">
                <label for="medicine${medicineCount}" class="custom-label">Medicine</label>
                <select class="form-select custom-inputa" id="medicine${medicineCount}" name="medicines[]">
                    <option value="" disabled selected>Select Medicine</option>
                </select>
                <button class="btn add-icon" type="button" onclick="addMedicineField()">
                    <i class="fas fa-plus-circle"></i>
                </button>
                <button class="btn remove-icon" type="button" onclick="removeMedicineField(${medicineCount})">
                    <i class="fas fa-minus-circle"></i>
                </button>
            </div>
            <div style="width: 45%;">
                <label for="dosage${medicineCount}">Dosage</label>
                <textarea id="dosage${medicineCount}" class="form-control custom-inputa" placeholder="1 + 0 + 1" name="dosages[]"></textarea>
            </div>
        `;

      medicineFields.appendChild(newFields);

      // Fetch medicines dynamically for the new field
      fetchMedicines(`medicine${medicineCount}`);
    }

    function removeMedicineField(count) {
      const medicineFields = document.querySelector('.medicine-fields');
      const fieldToRemove = document.getElementById(`medicine${count}`).closest('.d-flex');
      medicineFields.removeChild(fieldToRemove);
    }

    function fetchMedicines(selectId) {
      const selectElement = document.getElementById(selectId);

      // Fetch medicines using AJAX
      fetch('fetch_medicines.php')
        .then(response => response.json())
        .then(data => {
          // Populate the select options
          data.forEach(medicine => {
            const option = document.createElement('option');
            option.value = medicine.medicine_id;
            option.textContent = medicine.medicine_name;
            selectElement.appendChild(option);
          });
        })
        .catch(error => console.error('Error fetching medicines:', error));
    }

    // Fetch medicines for the initial field
    fetchMedicines('medicine1');
  </script>

  <script>
    let testCount = 1;

    function addTestField() {
      testCount++;

      const testFields = document.querySelector('.tests-fields');

      // Create new test field
      const newTestField = document.createElement('div');
      newTestField.classList.add('d-flex', 'mb-2');

      newTestField.innerHTML = `
        <div class="me-2" style="width: 45%;">
            <label for="test${testCount}" class="custom-label">Test</label>
            <select id="test${testCount}" class="form-select custom-inputa" name="tests[]">
                <option value="" disabled selected>Select Test</option>
            </select>
            <button class="btn add-icon" type="button" onclick="addTestField()">
                <i class="fas fa-plus-circle"></i>
            </button>
            <button class="btn remove-icon" type="button" onclick="removeTestField(${testCount})">
                <i class="fas fa-minus-circle"></i>
            </button>
        </div>
    `;

      testFields.appendChild(newTestField);

      // Fetch tests dynamically for the new field
      fetchTests(`test${testCount}`);
    }

    function removeTestField(count) {
      const testFields = document.querySelector('.tests-fields');
      const fieldToRemove = document.getElementById(`test${count}`).closest('.d-flex');
      testFields.removeChild(fieldToRemove);
    }

    function fetchTests(selectId) {
      const selectElement = document.getElementById(selectId);

      // Fetch tests using AJAX
      fetch('fetch_tests.php')
        .then(response => response.json())
        .then(data => {
          // Populate the select options
          data.forEach(test => {
            const option = document.createElement('option');
            option.value = test.test_id;
            option.textContent = test.test_name;
            selectElement.appendChild(option);
          });
        })
        .catch(error => console.error('Error fetching tests:', error));
    }

    // Fetch tests for the initial field
    fetchTests('test1');
  </script>

  <script>
    let adviceCount = 1;



    function addAdviceField() {
      adviceCount++;

      const adviceFields = document.querySelector('.advice-fields');

      // Create new advice field
      const newAdviceField = document.createElement('div');
      newAdviceField.classList.add('d-flex', 'mb-2');

      newAdviceField.innerHTML = `
        <div class="me-2" style="width: 45%;">
            <label for="generalAdvice${adviceCount}" class="custom-label">General Advice</label>
            <select id="generalAdvice${adviceCount}" class="form-select custom-inputa" name="generalAdvices[]">
                <option value="" disabled selected>Select General Advice</option>
            </select>
            <button class="btn add-icon" type="button" onclick="addAdviceField()">
                <i class="fas fa-plus-circle"></i>
            </button>
            <button class="btn remove-icon" type="button" onclick="removeAdviceField(${adviceCount})">
                <i class="fas fa-minus-circle"></i>
            </button>
        </div>
    `;

      adviceFields.appendChild(newAdviceField);

      // Fetch general advice dynamically for the new field
      fetchOptions(`generalAdvice${adviceCount}`);
    }

    function removeAdviceField(count) {
      const adviceFields = document.querySelector('.advice-fields');
      const fieldToRemove = document.getElementById(`generalAdvice${count}`).closest('.d-flex');
      adviceFields.removeChild(fieldToRemove);
    }

    // Function to fetch options using AJAX
    function fetchOptions(selectId) {
      const selectElement = document.getElementById(selectId);

      // Fetch options using AJAX
      fetch('fetch_general_advice.php')
        .then(response => response.json())
        .then(data => {

          // Populate the select options
          data.forEach(option => {
            const newOption = document.createElement('option');
            newOption.value = option.advice_id;
            newOption.textContent = option.advice_text;
            selectElement.appendChild(newOption);
          });
        })
        .catch(error => console.error(`Error fetching options: ${error}`));
    }

    // Fetch options for the initial field
    fetchOptions('generalAdvice1');
  </script>



</body>

</html>