@csrf

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $customer->name}}">
    <span class="text-danger">{{ $errors->first('name') }}</span>
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $customer->email}}">
    <span class="text-danger">{{ $errors->first('email') }}</span>
</div>
<button type="submit" class="btn btn-dark">Submit</button>
