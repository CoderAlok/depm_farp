<?php

function getExporterName($id = null)
{
    return \App\Models\tbl_exporters::where('id', $id)->first()->name;
}
