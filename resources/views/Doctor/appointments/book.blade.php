    <div id="book">
        <div style="text-align: center;" class="page">
            <h1><b>Appointment</b></h1>
            <h2>Doctor: {{ $appointment->doctor->user->name }}</h2>
            <h2>Patient: {{ $appointment->user->name }}</h2>
            <h2><b>Time:</b></h2>
            <h3>Start: {{ $appointment->start_time }}</h3>
            <h3>Finish: {{ $appointment->finish_time }}</h3>
            <h2><b>Specialization:</b> {{ $appointment->doctor->specialization }}</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint ipsa atque excepturi rerum quasi. Voluptate dignissimos iste nam, commodi reiciendis corrupti assumenda non deleniti sed cupiditate natus laborum, est eaque</p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga dignissimos, iste repellat qui adipisci soluta dolorum fugit est, non expedita culpa optio totam, labore sit porro? Fuga facilis a perferendis.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Non minus neque doloremque distinctio a asperiores eaque laudantium nobis? Aperiam, adipisci exercitationem sed nesciunt eligendi dolorum non reiciendis tempore velit odit.
            <h2>eHealth hospital</h2>
        </div>
    </div>
