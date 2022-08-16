
<?php $__env->startSection('content'); ?>
    <div required class="container">
        <div required class="row justify-content-center">


            <div class="col-sm-9 justify-content-center mb-4 ">

                <?php echo Form::open(['url' => 'staff/create', 'method' => 'post']); ?>


                    <h2 required class="text-center"><strong>XXVIII Juegos Inter escuelas de Cadetes 2022-Ejercito</strong>
                    </h2>
                    <h2 required class="text-center"><strong>Registrar Staff</strong></h2>

                    <div required class="form-group mt-1">

                        <?php echo e(Form::label('Fuerza', null, ['class' => 'control-label'])); ?>

                        <?php echo e(Form::select('force_id', array_merge(['0' => 'Seleccione la fuerza a la que pertenece'], $forceValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'force'], []))); ?>


                        <?php if($errors->has('force_id')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo e($errors->first('force_id')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div required class="form-group mt-2">
                        <?php echo e(Form::label('Grado', null, ['class' => 'control-label'])); ?>

                        <?php echo e(Form::select('grade_id', [], null, array_merge(['class' => 'form-control', 'required' => true, 'id' => 'grades'], []))); ?>


                        <?php if($errors->has('grade_id')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo e($errors->first('grade_id')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div required class="form-group mt-3">
                        <label>Nombre Completo</label>
                        <input type="text" name="name" required class="form-control" value="<?php echo e(old('name')); ?>">

                        <?php if($errors->has('name')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo e($errors->first('name')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div required class="form-group mt-3">
                        <label>Numero de documento</label>
                        <input type="number" name="identification" required class="form-control"
                            value="<?php echo e(old('identification')); ?>">

                        <?php if($errors->has('identification')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo e($errors->first('identification')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div required class="form-group mt-2">
                        <?php echo e(Form::label('Deporte al que pertenece', null, ['class' => 'control-label'])); ?>

                        <?php echo e(Form::select('sport_id', array_merge(['0' => 'Seleccione el deporte'], $sportValues->toArray()), null, array_merge(['class' => 'form-control', 'required' => true], []))); ?>



                        <?php if($errors->has('sport_id')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo e($errors->first('sport_id')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if(Session::has('status')): ?>
                        <br>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(Session::get('status')); ?>!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div required class="form-group mt-2 text-center">
                        <button type="submit" required class="btn btn-success col-sm-2 col-md-3 col-xs-2">
                            Registrar
                        </button>
                    </div>
                

                <?php echo Form::close(); ?>

            </div>


        </div>
    </div>

    <script>
        let grades = document.getElementById("grades");

        function insertGrades(data) {
            let options = `<option value="0"></option>`;

            data.map(element => {
                options += `<option value="${element.id}">${element.grade}</option>`;
            })

            grades.innerHTML = options;
        }

        function getForce(e) {
            let value = e.target.value;
            axios.get(`/forces/${value}/grade`)
                .then(res => {
                    insertGrades(res.data)
                })
        }

        let force = document.getElementById("force");
        force.addEventListener("change", getForce)

        function initialForce() {
            let value = force.value;
            axios.get(`/forces/${value}/grade`)
                .then(res => {
                    insertGrades(res.data)
                })
        }

        window.onload = initialForce;
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\luis.contrerasv\Documents\bkinterescuelas\resources\views/staff.blade.php ENDPATH**/ ?>