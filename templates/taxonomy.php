<h1>Taxonomies Manager</h1>

<?php

echo "<h1>Statistics - PCA & Averages</h1><br>";

use MathPHP\Statistics\Average;
use MathPHP\Statistics\Significance;
use MathPHP\Statistics\Multivariate\PCA;
use MathPHP\LinearAlgebra\MatrixFactory;

// Given
$data = array(array(  4, -30,   60,  -35),
              array(-30, 300, -675,  420),
              array( 60,-675, 1620,-1050),
              array(-35, 420,-1050,  700)
            );


$matrix = MatrixFactory::create($data);  // observations of possibly correlated variables
$center = true;                          // do mean centering of data
$scale  = true;                          // do standardization of data


// Build a principal component analysis model to explore
$model = new PCA($matrix, $center, $scale);

// Scores and loadings of the PCA model
$scores      = $model->getScores();       // Matrix of transformed standardized data with the loadings matrix
$loadings    = $model->getLoadings();     // Matrix of unit eigenvectors of the correlation matrix
$eigenvalues = $model->getEigenvalues();  // Vector of eigenvalues of components

var_dump($scores);

// Residuals, limits, critical values and more
$R2         = $model->getR2();           // array of R2 values
$cumR2      = $model->getCumR2();        // array of cummulative R2 values
$Q          = $model->getQResiduals();   // Matrix of Q residuals
$T2         = $model->getT2Distances();  // Matrix of T2 distances
//$T2Critical = $model->getCriticalT2();   // array of critical limits of T2
$QCritical  = $model->getCriticalQ();    // array of critical limits of Q


$numbers = [13, 18, 13, 14, 13, 16, 14, 21, 13];

// Mean, median, mode
$mean   = Average::mean($numbers);

echo "mean=" . $mean . "<br>";

$median = Average::median($numbers);

echo "median=" . $median . "<br>";

$mode   = Average::mode($numbers); // Returns an array — may be multimodal

echo "mode=" . $mode[0] . "<br>";


// Weighted mean
$weights       = [12, 1, 23, 6, 12, 26, 21, 12, 1];


$weighted_mean = Average::weightedMean($numbers, $weights);

echo "weighted_mean=" . $weighted_mean . "<br>";



// Other means of a list of numbers
$geometric_mean      = Average::geometricMean($numbers);
$harmonic_mean       = Average::harmonicMean($numbers);
$contraharmonic_mean = Average::contraharmonicMean($numbers);
$quadratic_mean      = Average::quadraticMean($numbers);  // same as rootMeanSquare
$root_mean_square    = Average::rootMeanSquare($numbers); // same as quadraticMean
$trimean             = Average::trimean($numbers);
$interquartile_mean  = Average::interquartileMean($numbers); // same as iqm
$interquartile_mean  = Average::iqm($numbers);               // same as interquartileMean
$cubic_mean          = Average::cubicMean($numbers);

// Truncated mean (trimmed mean)
$trim_percent   = 25;  // 25 percent of observations trimmed from each end of distribution
$truncated_mean = Average::truncatedMean($numbers, $trim_percent);

// Generalized mean (power mean)
$p                = 2;
$generalized_mean = Average::generalizedMean($numbers, $p); // same as powerMean
$power_mean       = Average::powerMean($numbers, $p);       // same as generalizedMean

// Lehmer mean
$p           = 3;
$lehmer_mean = Average::lehmerMean($numbers, $p);

// Moving averages
$n       = 3;
$weights = [3, 2, 1];
$SMA     = Average::simpleMovingAverage($numbers, $n);             // 3 n-point moving average
$CMA     = Average::cumulativeMovingAverage($numbers);
$WMA     = Average::weightedMovingAverage($numbers, $n, $weights);
$EPA     = Average::exponentialMovingAverage($numbers, $n);

// Means of two numbers
[$x, $y]       = [24, 6];
$agm           = Average::arithmeticGeometricMean($x, $y); // same as agm
$agm           = Average::agm($x, $y);                     // same as arithmeticGeometricMean
$log_mean      = Average::logarithmicMean($x, $y);
$heronian_mean = Average::heronianMean($x, $y);
$identric_mean = Average::identricMean($x, $y);


// Averages report
$averages = Average::describe($numbers);
print_r($averages);


/* Array (
    [mean]                => 15
    [median]              => 14
    [mode]                => Array ( [0] => 13 )
    [geometric_mean]      => 14.789726414533
    [harmonic_mean]       => 14.605077399381
    [contraharmonic_mean] => 15.474074074074
    [quadratic_mean]      => 15.235193176035
    [trimean]             => 14.5
    [iqm]                 => 14
    [cubic_mean]          => 15.492307432707
) */


/*
 * Compute Significance Tests
 */

 // T test - Two samples (from sample data)
echo "<br> ****** T Tests ******** <br>";

$x1    = [27.5, 21.0, 19.0, 23.6, 17.0, 17.9, 16.9, 20.1, 21.9, 22.6, 23.1, 19.6, 19.0, 21.7, 21.4];
$x2    = [27.1, 22.0, 20.8, 23.4, 23.4, 23.5, 25.8, 22.0, 24.8, 20.2, 21.9, 22.1, 22.9, 20.5, 24.4];
$tTest = Significance::tTest($x1, $x2);
print_r($tTest);

/* Array (
    [t]     => -2.4553600286929   // t score
    [df]    => 24.988527070145    // degrees of freedom
    [p1]    => 0.010688914613979  // one-tailed p value
    [p2]    => 0.021377829227958  // two-tailed p value
    [mean1] => 20.82              // mean of sample x₁
    [mean2] => 22.98667           // mean of sample x₂
    [sd1]   => 2.804894           // standard deviation of x₁
    [sd2]   => 1.952605           // standard deviation of x₂
) */



