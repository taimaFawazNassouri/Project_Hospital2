<form wire:submit.prevent="store">
        @if($message)
        <div class="alert alert-info"> جاري العمل على تأكيد الحجز.</div>
            {{-- @script
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "حجز المريض",
                        text: "جاري العمل علي تاكيد الحجز ",
                        footer: '<a href="#">Why do I have this issue?</a>'
                    });
                    location.reload()
                </script>
            @endscript --}}
        @endif
        @if (session('doctorLimit'))
        <div class="alert alert-danger" id="success--danger">
                <button class="close" data-dismiss="alert">x</button>
                <h4>لا يمكنك حجز موعد في التاريخ المحدد يرجى اختيار تاريخ اخر</h4>
            </div>
        {{-- @script
            <script>
                Swal.fire({
                    icon: "error",
                    title: "حجز المريض",
                    text: "{{ session('doctorLimit') }}",
                    footer: '<a href="#">Why do I have this issue?</a>'
                });
                
            </script>
        @endscript --}}

        @endif
        
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="text"  name="name" wire:model='name' placeholder="اسمك" required="">
                <span class="icon fa fa-user"></span>
            </div>
    
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="email"  name="email" wire:model='email' placeholder="البريد الالكتروني" required="">
                <span class="icon fa fa-envelope"></span>
            </div>
    
    
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">الدكتور</label>
                <select  wire:model.live="doctor" class="form-select" id="exampleFormControlSelect1">
    
    
                    @forelse ($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @empty
                        <option value="" disabled selected c>اختر من الاقسام اولا </option>
                    @endforelse
    
    
                </select>
            </div>
    
    
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">القسم</label>
                <select class="form-select" name="section_id" wire:model="section_id" wire:change='getDoctor'
                    id="exampleFormControlSelect1">
                    <option>-- اختار من القائمة --</option>
                    @foreach ($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
    
                </select>
            </div>
    
    
    
    
    
    
            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <input type="tel" name="phone" wire:model="phone" placeholder="رقم الهاتف" required="">
                <span class="icon fas fa-phone"></span>
            </div>
    
            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">تاريخ الموعد</label>
                <input type="date" wire:model="appointment_patient" required class="form-control">
            </div>
    
    
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <textarea name="notes" wire:model="notes" placeholder="ملاحظات"></textarea>
            </div>
    
    
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="theme-btn btn-style-two" type="submit" name="submit-form">
                    <span class="txt">تاكيد</span></button>
            </div>
        </div>
    </form>