@include('layouts.dashboard.main')
<style>
    ins{
        color: #fff;
        text-transform: uppercase;
    }
    .icofont-verification-check{
        color: var(--success);
    }
    .icofont-exclamation-circle {
        color: var(--primary);
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel-content">
                <h4 class="main-title">Quizzy Plans</h4>
                <h6 class="mb-4">Our prices included with tax is charged and expires 30 days after subscription </h6>
                <div class="price-plan-wraper">
                    <table class="table table-striped table-responsive-md">
                        <thead>
                            <tr class="blue-bg text-light">
                                <th>
                                    <ins>Customer Insights features</ins>
                                </th>
                                <th>
                                    <ins>Free</ins>
                                    <span>(XAF 0 / Month)</span>
                                </th>
                                <th>
                                    <ins>Basic</ins>
                                    <span>(XAF {{ $basic }} / Month)</span>
                                </th>
                                <th>
                                    <ins>Ultimate</ins>
                                    <span>(XAF {{ $ultimate }} / Month)</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h6>5 percent Transcation fee
                                    <a href="#" data-toggle="tooltip" title="Aenean ac suscipit nibh. Sed tristique, mauris id venenatis faucibus, mi risus suscipit tortor, eleifend dignissim dolor enim in eros. Etiam finibus dui lectus">
                                        <i class="icofont-exclamation-circle"></i>
                                    </a></h6>
                                </td>
                                <td><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Instant Payout Money
                                    <a href="#" data-toggle="tooltip" title="Aenean ac suscipit nibh. Sed tristique, mauris id venenatis faucibus, mi risus suscipit tortor, eleifend dignissim dolor enim in eros. Etiam finibus dui lectus">
                                        <i class="icofont-exclamation-circle"></i>
                                    </a></h6>
                                </td>
                                <td><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Two admin level users
                                    <a href="#" data-toggle="tooltip" title="Aenean ac suscipit nibh. Sed tristique, mauris id venenatis faucibus, mi risus suscipit tortor, eleifend dignissim dolor enim in eros. Etiam finibus dui lectus">
                                        <i class="icofont-exclamation-circle"></i>
                                    </a></h6>
                                </td>
                                <td><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Course Creator trainings
                                    <a href="#" data-toggle="tooltip" title="Aenean ac suscipit nibh. Sed tristique, mauris id venenatis faucibus, mi risus suscipit tortor, eleifend dignissim dolor enim in eros. Etiam finibus dui lectus">
                                        <i class="icofont-exclamation-circle"></i>
                                    </a></h6>
                                </td>
                                <td><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Advance customisaton and tutorial
                                    <a href="#" data-toggle="tooltip" title="Aenean ac suscipit nibh. Sed tristique, mauris id venenatis faucibus, mi risus suscipit tortor, eleifend dignissim dolor enim in eros. Etiam finibus dui lectus">
                                        <i class="icofont-exclamation-circle"></i>
                                    </a></h6>
                                </td>
                                <td class="not-included"><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Advance Reports
                                    <a href="#" data-toggle="tooltip" title="Aenean ac suscipit nibh. Sed tristique, mauris id venenatis faucibus, mi risus suscipit tortor, eleifend dignissim dolor enim in eros. Etiam finibus dui lectus">
                                        <i class="icofont-exclamation-circle"></i>
                                    </a></h6>
                                </td>
                                <td class="not-included"><i class="icofont-verification-check"></i></td>
                                <td class="not-included"><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Bulk Students enrollments
                                    <a href="#" data-toggle="tooltip" title="Aenean ac suscipit nibh. Sed tristique, mauris id venenatis faucibus, mi risus suscipit tortor, eleifend dignissim dolor enim in eros. Etiam finibus dui lectus">
                                        <i class="icofont-exclamation-circle"></i>
                                    </a></h6>
                                </td>
                                <td class="not-included"><i class="icofont-verification-check"></i></td>
                                <td class="not-included"><i class="icofont-verification-check"></i></td>
                                <td><i class="icofont-verification-check"></i></td>
                            </tr>
                            <tr>
                                <td colspan="1"></td>
                                <td>
                                    <a href="#" title="" class="button soft-danger">Your plan</a>
                                </td>
                                <td>
                                    <a href="{{ route('payment', 'basic') }}" title="" class="button outline-primary">Choose Plan</a>
                                </td>
                                <td>
                                    <a href="{{ route('payment', 'ultimate') }}" title="" class="button outline-primary">Choose Plan</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="main-wraper">
                    <ul class="pplan-links">
                        <li>Prices are in FCFA. 
                            <a href="#" title="">Pay with your prefered Mobile Money Network <i class="icofont-mobile-phone text-primary px-2 h5"></i></a>
                        </li>
                        <li>Already subscribed and want to upgrade or downgrade? 
                            <a href="#" title="">The easy way <i class="icofont-settings text-primary px-2 h5"></i></a>
                        </li>
                        <li>Got Questions? 
                            <a href="#" title="">Go to FAQ's <i class="icofont-question-circle text-primary px-2 h5"></i></a> or
                            <a href="{{ route('contact') }}" title=""> Contact our Team <i class="icofont-team text-primary px-2 h5"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>