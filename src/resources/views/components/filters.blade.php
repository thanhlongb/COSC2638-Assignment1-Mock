<div class="accordion mb-4" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Apply filter
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
        <div class="accordion-body">
            <form action="{{ route("getHomePage") }}" method="GET">
                <div class="row">
                    <div class="col-md-12">
                        @include('components.select', ['field' => 'gender', 'fieldLabel' => 'Gender', 'value' => ($gender ?? null), 'options' => ['any', 'male', 'female', 'other'], 'default' => ($gender ?? 'any')])
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        @include('components.input', ['field' => 'ageLessThan', 'fieldLabel' => 'Age Less Than', 'type' => 'number', 'value' => ($ageLessThan ?? null)])
                    </div>
                    <div class="col-sm-6">
                        @include('components.input', ['field' => 'ageGreaterThan', 'fieldLabel' => 'Age Greater Than', 'type' => 'number', 'value' => ($ageGreaterThan ?? null)])
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 my-4">
                        <a href="{{ route("getHomePage") }}" class="btn btn-outline-secondary">Clear filters</a>
                        <div class="form-group float-end">
                            <button class="btn btn-success" type="submit">Apply</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
