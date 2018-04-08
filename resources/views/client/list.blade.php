<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="clients-list">
                <div class="tab-content">
                    <div class="full-height-scroll">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tbody>
                                @foreach($data as $person)
                                    <tr data-toggle="modal" data-target="#myModal5">
                                        <td class="client-avatar"><img alt="image" src="img/a{{ $person['imgNo'] }}.jpg"> </td>
                                        <td><a data-toggle="tab" href="#contact-1" class="client-link">{{ $person['name'] }}</a></td>
                                        <td> {{ $person['company'] }}</td>
                                        <td class="contact-type"><i class="fa fa-envelope"> </i></td>
                                        <td> {{ $person['email'] }}</td>
                                        <td>
                                            <button class="btn btn-danger btn-circle btn-xm" type="button">
                                                    <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>